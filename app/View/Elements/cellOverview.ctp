<?php if(Set::check($item, 'Item.'.$pointer)){ ?>
        <?php if($item['Item'][$pointer][0]['totalC'] === $item['Item'][$pointer][0]['total']){ ?>
                <td class="bg-success-300 media" style="cursor: pointer;" onclick="overView('<?php echo $item['towerId']; ?>', '<?php echo $item['Item'][$pointer]['Location2']['id']; ?>')"><?php echo $name; ?></td>
        <?php } else if($item['Item'][$pointer][0]['totalNC'] > 0){ ?>
                <td class="bg-danger-600 media" style="cursor: pointer;" onclick="overView('<?php echo $item['towerId']; ?>', '<?php echo $item['Item'][$pointer]['Location2']['id']; ?>')"><?php echo $name; ?><span class="badge bg-danger-300 media-badge" style="margin-left: 48px;"><?php echo $item['Item'][$pointer][0]['totalNC']; ?></span></td>
        <?php } else if($item['Item'][$pointer][0]['totalC'] > 0){ ?>
                <td  class="bg-grey-300 media" style="cursor: pointer;" onclick="overView('<?php echo $item['towerId']; ?>', '<?php echo $item['Item'][$pointer]['Location2']['id']; ?>')"><?php echo $name; ?></td>
        <?php } else { ?>                                                                    
                <td style="cursor: pointer;" onclick="overView('<?php echo $item['towerId']; ?>', '<?php echo $item['Item'][$pointer]['Location2']['id']; ?>')"><?php echo $name; ?></td>
        <?php } ?>
<?php } else { ?>                                                                    
        <td style="cursor: pointer;"><?php echo $name; ?></td>
<?php } ?>


