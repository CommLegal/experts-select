<label id="add-app-last-label" for"add-app-last" style="display:none;">End Time</label>
<select name="add-app-last" id="add-app-last" class="venue-box" style="display:none;">
  <option>Last Appointment</option>
      <?php
          for($i = $_POST['add-app-start']; $i <= 20; $i++) {
              echo "<option value=\"" . $i . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
          }
      ?>
</select>