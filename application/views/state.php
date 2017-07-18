<div class="form-group">
    <label>State</label>
    <select name="state" class="form-control">
        <?php
        if (is_array($states)) {
            foreach ($states as $row) {
                ?>
                <option value="<?php echo $row->name ?>"><?php echo $row->name ?> </option>
                <?php
            }
        }
        ?>
    </select>
</div>