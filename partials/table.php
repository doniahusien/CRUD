<table class="table-auto border-collapse border border-gray-700 w-full">
    <thead>
        <tr class="bg-gray-700">
            <th>Image</th>
            <th class="px-4 py-5">Name</th>
            <th class="px-4 py-5">Email</th>
            <th class="px-4 py-5">Phone</th>
            <th class="px-4 py-5">Website</th>
            <th class="px-4 py-5">Username</th>
            <th class="px-4 py-5">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr class="">
                <td class="border w-36 h-36">
                    <?php
                    $imagePath = isset($user['extenstion']) ? "users/images/{$user['id']}.{$user['extenstion']}" : 'users/images/OIP.jpeg';
                    ?>
                    <img src="<?= $imagePath; ?>" class="w-full h-full" alt="">
                </td>

                <td class="border px-10  text-center"><?= $user['name'] ?></td>
                <td class="border px-10 text-center"><?= $user['username'] ?></td>
                <td class="border px-10 text-center"><?= $user['email'] ?></td>
                <td class="border px-10 text-center"><?= $user['phone'] ?></td>
                <td class="border px-10 text-center">
                    <a target="_blank" href="http://<?= $user['website'] ?>">
                        <?= $user['website'] ?>
                    </a>
                </td>

                <td class="border px-2 gap-5 flex justify-center items-center h-48">
                    <button class="bg-blue-500 flex justify-center items-center text-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="view.php?id=<?= $user['id'] ?>">View</a>
                    </button>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <a href="update.php?id=<?= $user['id'] ?>">Update</a>
                    </button>
                <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>