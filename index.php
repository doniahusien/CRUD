<?php
include './partials/header.php';
require './users/users.php';
$users = getUsers();
?>
<div class='flex flex-col justify-center items-center py-10'>
    <div class="flex items-center justify-center">
        <div class=" p-5 shadow-md">
            <?php include './partials/table.php'; ?>
        </div>
    </div>
    <div class=" pb-10">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <a href="create.php">CREATE USER</a>
        </button>
    </div>
</div>


<?php include './partials/footer.php'; ?>