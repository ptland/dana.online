<?php
/**
 * Created by PhpStorm.
 * User: Dana.io
 * Date: 7/1/2017
 * Time: 1:57 PM
 */

declare(strict_types=1);

namespace App\Model;

session_start();

class Cart
{
    protected $cart_contents = [];

    function __construct()
    {
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents'] : NULL;
        if ( $this->cart_contents === NULL )
        {
            $this->cart_contents = [
                'cart_total' => 0,
                'total_items' => 0
            ];
        }
    }

    public function contents()
    {
        $cart = array_reverse($this->cart_contents);

        unset($cart['total_items']);
        unset($cart['cart_total']);

        return $cart;
    }

    public function getItem($row_id)
    {
        return (in_array($row_id, ['total_items', 'cart_total'], TRUE) || !isset($this->cart_contents[$row_id]) )
            ? FALSE
            : $this->cart_contents[$row_id];
    }

    public function total_items()
    {
        return $this->cart_contents['total_items'];
    }

    public function total()
    {
        return $this->cart_contents['cart_total'];
    }


    public function insert($item=[])
    {
        if ( !is_array($item) || count($item) === 0)
        {
            return false;
        }
        else
        {
            $item['quantity'] = (float)$item['quantity'];
            if ( $item['quantity'] == 0 )
            {
                return false;
            }

            $item['price'] = (float)$item['price'];

            $rowid = md5($item['id']);

            $old_qty = isset($this->cart_contents[$rowid]['quantity'])
                ? $this->cart_contents[$rowid]['quantity'] : 0;

            $item['rowid'] = $rowid;
            $item['quantity'] += $old_qty;
            $this->cart_contents[$rowid] = $item;

            if ( $this->save_cart() )
            {
                return is_array($rowid)? $rowid : true;
            }else
            {
                return false;
            }
        }
    }

    public function update($item=[])
    {
        if (!is_array($item) || count($item) === 0)
        {
            return false;
        }
        else
        {
            if( !isset($item['rowid'], $this->cart_contents[$item['rowid']]) )
            {
                return false;
            }
            else
            {
                if( isset($item['quantity']) )
                {
                    $item['quantity'] = (float)$item['quantity'];
                    if( $item['quantity'] == 0 )
                    {
                        unset($this->cart_contents[$item['rowid']]);
                        return true;
                    }
                }

                $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item));

                if( isset($item['price']) )
                {
                    $item['price'] = (float)$item['price'];
                }
                foreach (array_diff($keys, ['id', 'name']) as $key)
                {
                    $this->cart_contents[$item['rowid']][$key] = $item[$key];
                }

                $this->save_cart();
                return true;
            }
        }
    }
    public function save_cart()
    {
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
        foreach ($this->cart_contents as $key => $val){
            if(!is_array($val) OR !isset($val['price'], $val['quantity'])){
                continue;
            }

            $this->cart_contents['cart_total'] += ($val['price'] * $val['quantity']);
            $this->cart_contents['total_items'] += $val['quantity'];
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['price'] * $this->cart_contents[$key]['quantity']);
        }

        // if cart empty, delete it from the session
        if(count($this->cart_contents) <= 2){
            unset($_SESSION['cart_contents']);
            return FALSE;
        }else{
            $_SESSION['cart_contents'] = $this->cart_contents;
            return TRUE;
        }
    }
    public function remove($row_id){
        unset($this->cart_contents[$row_id]);
        $this->save_cart();
        return TRUE;
    }


    public function destroy(){
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contents']);
    }

}