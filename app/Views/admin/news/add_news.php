<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?> 
 
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Add News</h2>

    <!-- Flash messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url(route_to('store_news')) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        <?php $errors = session('errors'); ?>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="<?= old('title') ?>" class="mt-1 block w-full border <?= isset($errors['title']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm p-2 focus:ring focus:ring-blue-200" required>
            <?php if (isset($errors['title'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= esc($errors['title']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="5" class="mt-1 block w-full border <?= isset($errors['content']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm p-2"><?= old('content') ?></textarea>
            <?php if (isset($errors['content'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= esc($errors['content']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border <?= isset($errors['status']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm p-2">
                <option value="draft" <?= old('status') === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="published" <?= old('status') === 'published' ? 'selected' : '' ?>>Published</option>
                <option value="published" <?= old('status') === 'archived' ? 'selected' : '' ?>>Archived</option>
            </select>
            <?php if (isset($errors['status'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= esc($errors['status']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Publish Date -->
        <div>
            <label for="publish_date" class="block text-sm font-medium text-gray-700">Publish Date</label>
            <input type="datetime-local" name="publish_date" id="publish_date" value="<?= esc(old('publish_date', date('Y-m-d\TH:i'))) ?>" class="mt-1 block w-full border <?= isset($errors['publish_date']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm p-2">
            <?php if (isset($errors['publish_date'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= esc($errors['publish_date']) ?></p>
            <?php endif; ?>
        </div>
        <?php echo date_default_timezone_get(); ?>
        <!-- File Uploads -->
        <div id="file-upload-group">
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Files & Titles</label>

            <div class="space-y-4" id="file-input-list">
                <?php
                $old_titles = old('file_titles') ?? [''];
                $count = count($old_titles);
                for ($i = 0; $i < $count; $i++):
                ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="file_titles[]" placeholder="File Title"
                            value="<?= esc($old_titles[$i]) ?>"
                            class="block w-full border <?= isset($errors["file_titles.$i"]) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm p-2" />
                        <?php if (isset($errors["file_titles.$i"])): ?>
                            <p class="text-red-600 text-sm mt-1"><?= esc($errors["file_titles.$i"]) ?></p>
                        <?php endif; ?>

                        <input type="file" name="files[]" class="block w-full text-sm text-gray-500" />
                    </div>
                <?php endfor; ?>
            </div>

            <?php if (isset($errors['files.*'])): ?>
                <p class="text-red-600 text-sm mt-2"><?= esc($errors['files.*']) ?></p>
            <?php endif; ?>

            <button type="button" onclick="addFileInput()" class="mt-3 text-blue-600 hover:underline text-sm">+ Add another file</button>
        </div>


        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Submit</button>
        </div>
    </form>
</div>

<script>
    function addFileInput() {
        const container = document.getElementById('file-input-list');
        const currentCount = container.children.length;

        // Restrict to a maximum of 5 files
        // Also change in PHP validation of store_news() in the News controller
        if (currentCount >= 5) {
            alert('Maximum of 5 files allowed.');
            return;
        }

        const inputGroup = document.createElement('div');
        inputGroup.className = "grid grid-cols-1 md:grid-cols-2 gap-4";
        inputGroup.innerHTML = `
            <input type="text" name="file_titles[]" placeholder="File Title" class="block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            <input type="file" name="files[]" class="block w-full text-sm text-gray-500" />
        `;
        container.appendChild(inputGroup);
    }
</script>

<?= $this->endSection() ?>