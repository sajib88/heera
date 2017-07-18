<div class="form-group">
    <label>Sub Catagory</label>
    <select name="state" class="form-control">
        <?php
        if (is_array($cld_sub_cat)) {
            foreach ($cld_sub_cat as $row) {
                ?>
                <option value="<?php echo $row->name ?>"><?php echo $row->name ?> </option>
                <?php
            }
        }
        ?>
    </select>
</div>