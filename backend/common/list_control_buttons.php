

<a data-toggle="tooltip" data-placement="left" title="" 
   data-original-title="View Detail" href="index.php?action=<?= $type ?>_detail&id=<?= $row['id'] ?>">
    <i class="fa fa-eye"></i>
</a>
<a data-toggle="tooltip" data-placement="left" title="" 
   data-original-title="Edit"  
   href="index.php?action=<?= $type ?>_edit&id=<?= $row['id'] ?>">
    <i class="fa fa-edit"></i>
</a>
<a href="#" data-toggle="tooltip" data-placement="left" title="" 
   data-original-title="Delete" 
   onclick="confirmDelete('index.php?action=<?= $type ?>_delete&id=<?= $row['id'] ?>', '<?= $type ?>')">
    <i class="fa fa-trash-o"></i>
</a>