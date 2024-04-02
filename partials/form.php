<div class="flex justify-center items-center h-screen w-full">
    <div class="bg-white p-8 rounded-lg shadow-lg w-1/2 bg-blue-500">
        <h3>
            <?php if ($user['id']) : ?>
                Update user <b><?= $user['name'] ?></b>
            <?php else : ?>
                Create new User
            <?php endif ?>
        </h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-lg mb-2 text-black">Name:</label>
                <input type="text" value="<?= $user['name'] ?>" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-black <?= $errors['name'] ? 'border-red-500' : '' ?>">
                <?php if (isset($errors['name'])) : ?>
                    <p class="visible peer-invalid:visible text-red-700 font-light">
                        <?= $errors['name'] ?>
                    </p>
                <?php endif; ?>
            </div>


            <div class="mb-4">
                <label for="username" class="block text-lg mb-2 text-black">Username:</label>
                <input type="text" name="username" id="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-black" value="<?= $user['username'] ?>">
                <?php if (isset($errors['username'])) : ?>
                    <p class="visible peer-invalid:visible text-red-700 font-light">
                        <?= $errors['username'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg mb-2 text-black">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-black" value="<?= $user['email'] ?>">
                <?php if (isset($errors['username'])) : ?>
                    <p class="visible peer-invalid:visible text-red-700 font-light">
                        <?= $errors['email'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-lg mb-2 text-black">Phone:</label>
                <input type="tel" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-black" value="<?= $user['phone'] ?>">
                <?php if (isset($errors['username'])) : ?>
                    <p class="visible peer-invalid:visible text-red-700 font-light">
                        <?= $errors['phone'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="website" class="block text-lg mb-2 text-black">Website:</label>
                <input type="text" name="website" id="website" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-black" value="<?= $user['website'] ?>">
    
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg mb-2 text-black">Upload Image:</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Submit</button>
        </form>
    </div>
</div>