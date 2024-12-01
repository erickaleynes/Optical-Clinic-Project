<h1>Appointments</h1>
<a href="appointments/create">Create New Appointment</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $appointment['user_id']; ?></td>
                <td><?= $appointment['date']; ?></td>
                <td><?= $appointment['time']; ?></td>
                <td><?= $appointment['description']; ?></td>
                <td><?= $appointment['status']; ?></td>
                <td>
                    <a href="appointments/edit/<?= $appointment['id']; ?>">Edit</a>
                    <a href="appointments/delete/<?= $appointment['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
