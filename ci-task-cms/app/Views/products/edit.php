<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors">
            <i class="ph-bold ph-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-gray-100">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="ph-bold ph-pencil-simple text-2xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900">Edit Product</h2>
                <p class="text-sm text-gray-500 font-medium">Update stock and pricing details.</p>
            </div>
        </div>
        
        <form action="<?= base_url('products/update/'.$product['product_id']) ?>" method="POST" class="space-y-6">
            <div>
                <label for="product_name" class="block text-sm font-bold text-gray-700 mb-2">Product Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <i class="ph-bold ph-tag"></i>
                    </div>
                    <input type="text" name="product_name" id="product_name" value="<?= esc($product['product_name']) ?>" required class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="qty_in_stock" class="block text-sm font-bold text-gray-700 mb-2">Quantity in Stock</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i class="ph-bold ph-stack"></i>
                        </div>
                        <input type="number" name="qty_in_stock" id="qty_in_stock" value="<?= esc($product['qty_in_stock']) ?>" required min="0" class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm outline-none">
                    </div>
                </div>

                <div>
                    <label for="price" class="block text-sm font-bold text-gray-700 mb-2">Price (Rp)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i class="ph-bold ph-currency-dollar"></i>
                        </div>
                        <input type="number" step="0.01" name="price" id="price" value="<?= esc($product['price']) ?>" required min="0" class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm outline-none">
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="<?= base_url('products') ?>" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-600 bg-white border border-gray-200 shadow-sm hover:bg-gray-50 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all">Update Product</button>
            </div>
        </form>
    </div>
</div>
