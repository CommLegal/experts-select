<label for"add-app-start">End Time</label>
<select name="add-app-last" id="add-app-last" class="venue-box">
      <?php
          for($i = $_POST['add-app-start'] + 1; $i <= 21; $i++) {
              echo "<option value=\"" . $i . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
          }
      ?>
</select>
