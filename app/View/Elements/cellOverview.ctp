<?php if(Set::check($array, $key.'.'.$pointer)){ ?>
        <?php if($array[$key][$pointer][0]['totalC'] === $array[$key][$pointer][0]['total']){ ?>
                <td <?php echo $attribute; ?> class="bg-success-300 media text-center" style="cursor: pointer;" onclick="overView('<?php echo $array['towerId']; ?>', '<?php echo $keyName; ?>', '<?php echo $array[$key][$pointer][$keyName]['id']; ?>')"><?php echo $name; ?></td>
        <?php } else if($array[$key][$pointer][0]['totalNC'] > 0){ ?>
                <td <?php echo $attribute; ?> class="bg-danger-600 media text-center" style="cursor: pointer;" onclick="overView('<?php echo $array['towerId']; ?>', '<?php echo $keyName; ?>', '<?php echo $array[$key][$pointer][$keyName]['id']; ?>')"><?php echo $name; ?><span class="badge bg-danger-300 media-badge" style="margin-left: 4px;"><?php echo $array[$key][$pointer][0]['totalNC']; ?></span></td>
        <?php } else if($array[$key][$pointer][0]['totalC'] > 0){ ?>
                <td <?php echo $attribute; ?>  class="bg-grey-300 media text-center" style="cursor: pointer;" onclick="overView('<?php echo $array['towerId']; ?>', '<?php echo $keyName; ?>', '<?php echo $array[$key][$pointer][$keyName]['id']; ?>')"><?php echo $name; ?></td>
        <?php } else { ?>                                                                    
                <td <?php echo $attribute; ?> class="text-center" style="cursor: pointer;" onclick="overView('<?php echo $array['towerId']; ?>', '<?php echo $keyName; ?>', '<?php echo $array[$key][$pointer][$keyName]['id']; ?>')"><?php echo $name; ?></td>
        <?php } ?>
<?php } else { ?>                                                                    
        <td <?php echo $attribute; ?> class="text-center" style="cursor: pointer;"><?php echo $name; ?></td>
<?php } ?>


