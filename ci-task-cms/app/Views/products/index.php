<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-bold mb-3 border border-blue-100">
            <i class="ph-fill ph-package"></i> Inventory Management
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900">Products Catalog</h1>
        <p class="mt-2 text-md text-gray-500">Manage pricing, stock levels, and product details.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="<?= base_url('products/create') ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300">
            <i class="ph-bold ph-plus"></i> Add New Product
        </a>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 overflow-x-auto">
        <table class="datatable nowrap min-w-full divide-y divide-gray-100">
            <thead>
                <tr class="bg-gray-50/50">
                    <th scope="col" class="py-4 pl-6 pr-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product Name</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Stock</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Price</th>
                    <th scope="col" class="relative py-4 pl-3 pr-6 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 bg-white">
                <?php foreach ($products as $product): ?>
                <tr class="hover:bg-blue-50/30 transition-colors duration-150 group">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-semibold text-gray-900">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                            #<?= $product['product_id'] ?>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-700 group-hover:text-blue-700 transition-colors">
                        <?= esc($product['product_name']) ?>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $product['qty_in_stock'] > 10 ? 'bg-green-100 text-green-800' : ($product['qty_in_stock'] > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') ?>">
                            <?= esc($product['qty_in_stock']) ?> in stock
                        </span>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-bold text-gray-900">
                        Rp <?= number_format($product['price'], 0, ',', '.') ?>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-3 opacity-70 group-hover:opacity-100 transition-opacity">
                            <a href="<?= base_url('products/edit/'.$product['product_id']) ?>" class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 hover:text-blue-700 transition-colors" title="Edit">
                                <i class="ph-bold ph-pencil-simple text-lg"></i>
                            </a>
                            <a href="<?= base_url('products/delete/'.$product['product_id']) ?>" class="btn-delete p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors" data-confirm-msg="Yakin ingin menghapus produk ini?" title="Delete">
                                <i class="ph-bold ph-trash text-lg"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
