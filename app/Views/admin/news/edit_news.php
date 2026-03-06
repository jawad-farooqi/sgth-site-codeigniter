<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Edit News</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <?= session('error') ?>
        </div>
    <?php endif; ?>



    <form action="<?= site_url(route_to('update_news', $news['news_id'])) ?>"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6">

        <?= csrf_field() ?>

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text"
                   name="title"
                   value="<?= old('title', esc($news['title'])) ?>"
                   class="mt-1 block w-full border <?= isset($errors['title']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md p-2"
                   required>
            <?php if (isset($errors['title'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= esc($errors['title']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Content -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content"
                      rows="5"
                      class="mt-1 block w-full border <?= isset($errors['content']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md p-2"><?= old('content', esc($news['content'])) ?></textarea>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status"
                    class="mt-1 block w-full border <?= isset($errors['status']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md p-2">
                <option value="draft" <?= old('status', $news['status']) === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="published" <?= old('status', $news['status']) === 'published' ? 'selected' : '' ?>>Published</option>
                <option value="archived" <?= old('status', $news['status']) === 'archived' ? 'selected' : '' ?>>Archived</option>
            </select>
        </div>

        <!-- Publish Date -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Publish Date</label>
            <input type="datetime-local"
                   name="publish_date"
                   value="<?= old('publish_date', date('Y-m-d\TH:i', strtotime($news['publish_date']))) ?>"
                   class="mt-1 block w-full border <?= isset($errors['publish_date']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md p-2">
        </div>

        <!-- Existing Files -->
        <?php if (!empty($files)): ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Existing Files
                </label>

                <ul class="space-y-2">
                    <?php foreach ($files as $file): ?>
                        <li class="flex justify-between items-center bg-gray-50 p-3 rounded border">
                            <div>
                                <p class="font-medium"><?= esc($file['title']) ?></p>
                                <p class="text-xs text-gray-500">
                                    <?= esc($file['original_name']) ?>
                                </p>
                            </div>

                            <a href="<?= base_url($file['stored_path']) ?>"
                               target="_blank"
                               class="text-blue-600 text-sm hover:underline">
                                View
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Upload New Files -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Add New Files
            </label>

            <div id="file-input-list" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text"
                           name="file_titles[]"
                           placeholder="File Title"
                           class="block w-full border border-gray-300 rounded-md p-2" />

                    <input type="file"
                           name="files[]"
                           class="block w-full text-sm text-gray-500" />
                </div>
            </div>

            <button type="button"
                    onclick="addFileInput()"
                    class="mt-3 text-blue-600 hover:underline text-sm">
                + Add another file
            </button>
        </div>

<!-- Buttons -->
<div class="w-full mt-6">
    <div class="flex flex-col sm:flex-row sm:justify-end gap-3">

        <!-- Update Button -->
        <button type="submit"
            class="order-1 sm:order-2 w-full sm:w-auto
                   inline-flex items-center justify-center gap-2
                   px-6 py-2
                   bg-blue-600 text-white
                   rounded-lg font-medium
                   hover:bg-blue-700
                   transition duration-200
                   shadow-sm">
            Update
        </button>

        <!-- Delete Button -->
        <button type="submit"
            formaction="<?= route_to('delete_news', $news['news_id']) ?>"
            formmethod="post"
            onclick="return confirm('Are you sure you want to delete this news?')"
            class="order-2 sm:order-1 w-full sm:w-auto
                   inline-flex items-center justify-center gap-2
                   px-6 py-2
                   border border-red-600 text-red-600
                   rounded-lg font-medium
                   hover:bg-red-50
                   transition duration-200">
            Delete
        </button>

    </div>
</div>

    </form>
</div>

<script>
function addFileInput() {
    const container = document.getElementById('file-input-list');

    if (container.children.length >= 5) {
        alert('Maximum of 5 files allowed.');
        return;
    }

    const div = document.createElement('div');
    div.className = "grid grid-cols-1 md:grid-cols-2 gap-4";
    div.innerHTML = `
        <input type="text"
               name="file_titles[]"
               placeholder="File Title"
               class="block w-full border border-gray-300 rounded-md p-2" />

        <input type="file"
               name="files[]"
               class="block w-full text-sm text-gray-500" />
    `;

    container.appendChild(div);
}
</script>

<?= $this->endSection() ?>