<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Event & Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-start justify-center pt-10">

<div class="max-w-2xl w-full bg-white shadow-md rounded-xl p-8">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Create Event and Upload Images</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="mt-6 text-green-600 font-medium text-center bg-green-100 p-3 rounded-lg">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="mt-6 text-red-600 font-medium text-center bg-red-100 p-3 rounded-lg">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= route_to('store_event') ?>" method="post" enctype="multipart/form-data" class="space-y-5">
        <?= csrf_field() ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
            <input type="text" name="event_name" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Event Description</label>
            <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Directory Name <span class="text-xs text-gray-500">(no spaces)</span></label>
            <input type="text" name="folder_name" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Event Date</label>
            <input type="date" name="event_date" value="<?= set_value('event_date', date('Y-m-d')) ?>" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail Image</label>
            <input type="file" name="thumbnail" required class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Event Images</label>
            <input type="file" name="images[]" multiple required class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
        </div>

        <div class="text-center">
            <input type="submit" value="Create Event & Upload" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition">
        </div>
    </form>
</div>
</body>
</html>