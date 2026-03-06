<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-4">All News</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($newsWithFiles)): ?>
        <?php foreach ($newsWithFiles as $news): ?>
            <div class="border rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xl font-semibold"><?= esc($news['title']) ?></h3>
                    <a href="<?= route_to('edit_news', $news['news_id']) ?>"
                       class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 transition">
                        Edit 
                    </a>
                </div>

                <div class="text-sm text-gray-600 mb-2">
                    Status: <span class="font-medium"><?= esc($news['status']) ?></span> |
                    Publish Date: <?= esc($news['publish_date']) ?> |
                    Created: <?= esc($news['created_at']) ?> |
                    Updated: <?= esc($news['updated_at']) ?>
                </div>

                <p class="mb-2"><?= esc($news['content']) ?></p>

                <?php if (!empty($news['files'])): ?>
                    <div class="mb-2">
                        <h4 class="font-medium">Files:</h4>
                        <ul class="list-disc list-inside">
                            <?php foreach ($news['files'] as $file): ?>
                                <li>
                                    <?= esc($file['title']) ?> 
                                    (<?= esc($file['size']) ?>)
                                       
                                    <a href="<?= base_url($file['stored_path']) ?>"
                                        target="_blank"
                                        class="text-blue-600 hover:underline">
                                        View File
                                    </a>

 
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-gray-600">No news available.</p>
    <?php endif; ?>
</div>

<?php
$totalPages = ceil($totalNews / $perPage);
if ($totalPages > 1): ?>
    <div class="flex justify-center mt-6 space-x-2">
        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <a href="<?= current_url() . '?page=' . $p ?>"
               class="px-3 py-1 rounded <?= $p == $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' ?>">
               <?= $p ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>



<?= $this->endSection() ?>
