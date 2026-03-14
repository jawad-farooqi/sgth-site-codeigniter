<form method="post" action="<?= base_url('events/update/'.$event['event_id']) ?>">

<label>Event Name</label>
<input type="text" name="event_name" value="<?= $event['event_name'] ?>">

<br><br>

<label>Event Date</label>
<input type="date" name="event_date" value="<?= $event['event_date'] ?>">

<br><br>

<label>Status</label>

<select name="active_status">

<option value="1" <?= $event['active_status']==1?'selected':'' ?>>
Active
</option>

<option value="0" <?= $event['active_status']==0?'selected':'' ?>>
Inactive
</option>

</select>

<br><br>

<button type="submit">Update Event</button>

</form>