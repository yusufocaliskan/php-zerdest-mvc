<h1>List of the Users</h1>
<hr>

<table id="all_users">
    <tr>
        <td>Id </td>
        <td>Name </td>
        <td>Password </td>
        <td>E-mail </td>
        <td>Actions </td>
    </tr>
    <?php foreach ($all_users as $user): ?>
        <tr>
            <td><?php echo $user['userId']?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_password']; ?></td>
            <td><?php echo $user['user_email']; ?></td>
            <td><a href="#">Delete</a> | <a href="#">Edit</a> </td>
        </tr>
    <?php endforeach; ?>
</table>