<?php
include './partials/header.php';
require('./users/users.php');
$userId = $_GET['id'];

$user = getUserById($userId);

if (!isset($user) || !isset($_GET['id'])) {
    header('Location: ../partials/notFound.php');
}

?>

<div class="flex justify-center p-10 h-screen">
    <table class="border border-separate border-gray-400 w-1/2 text-zinc-300">
        <thead>
            <tr>
                <th class='text-3xl text-left px-4 py-8' colspan="2">View <?= $user['name']?></th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-2xl">Name</th>
                <td class="px-12 py-2 text-center text-xl"><?= $user['name'] ?></td>
            </tr>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-2xl">Username</th>
                <td class="px-4 py-2 text-center text-xl"> <?= $user['username'] ?></td>
            </tr>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-2xl">Email</th>
                <td class="px-4 py-2 text-center text-xl"> <?= $user['email'] ?></td>
            </tr>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-2xl">Phone</th>
                <td class="px-4 py-2 text-center text-xl"> <?= $user['phone'] ?></td>
            </tr>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-2xl">Website</th>
                <td class="px-4 py-2 text-center text-xl">
                    <a class="underline underline-offset-4" target="_blank" href="http://<?= $user['website'] ?>"> <?= $user['website'] ?></a>
                </td>
            </tr>
            <th></th>
                <td class=" gap-5 flex justify-end items-end pt-5 px-8">
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
        </tbody>
    </table>
</div>

<?php include './partials/footer.php'; ?>