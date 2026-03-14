

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php foreach($events as $event): ?>

<tr>
<td><?= $event['event_id'] ?></td>
<td><?= $event['event_name'] ?></td>
<td><?= $event['event_date'] ?></td>
<td><?= $event['active_status'] ? 'Active' : 'Inactive' ?></td>

<td>

<a href="<?= base_url('events/edit/'.$event['event_id']) ?>">
Edit
</a>

|

<a href="<?= base_url('events/delete/'.$event['event_id']) ?>"
onclick="return confirm('Delete this event?')">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</table>