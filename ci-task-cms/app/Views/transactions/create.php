<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="<?= base_url('transactions') ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-emerald-600 transition-colors">
            <i class="ph-bold ph-arrow-left"></i> Back to Transactions
        </a>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-gray-100">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i class="ph-bold ph-receipt text-2xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900">Record Transaction</h2>
                <p class="text-sm text-gray-500 font-medium">Log a new sale into the system.</p>
            </div>
        </div>
        
        <form action="<?= base_url('transactions/store') ?>" method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">Customer</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 z-10">
                            <i class="ph-bold ph-user"></i>
                        </div>
                        <select name="user_id" id="user_id" required class="select2-searchable block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all shadow-sm outline-none appearance-none">
                            <option value="">Select a user...</option>
                            <?php foreach ($users as $u): ?>
                                <option value="<?= $u['user_id'] ?>"><?= esc($u['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="payment_method" class="block text-sm font-bold text-gray-700 mb-2">Payment Method</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 z-10">
                            <i class="ph-bold ph-wallet"></i>
                        </div>
                        <select name="payment_method" id="payment_method" required class="select2-searchable block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all shadow-sm outline-none appearance-none">
                            <option value="Cash">Cash</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <label for="product_id" class="block text-sm font-bold text-gray-700 mb-2">Product</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 z-10">
                        <i class="ph-bold ph-package"></i>
                    </div>
                    <select name="product_id" id="product_id" required class="select2-searchable block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all shadow-sm outline-none appearance-none">
                        <option value="">Select a product...</option>
                        <?php foreach ($products as $p): ?>
                            <option value="<?= $p['product_id'] ?>"><?= esc($p['product_name']) ?> &mdash; Rp <?= number_format($p['price'], 0, ',', '.') ?> (Stock: <?= $p['qty_in_stock'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="qty" class="block text-sm font-bold text-gray-700 mb-2">Quantity</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <i class="ph-bold ph-stack"></i>
                    </div>
                    <input type="number" name="qty" id="qty" required min="1" value="1" class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all shadow-sm outline-none">
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="<?= base_url('transactions') ?>" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-600 bg-white border border-gray-200 shadow-sm hover:bg-gray-50 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-emerald-500 shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:-translate-y-0.5 transition-all">Record Sale</button>
            </div>
        </form>
    </div>
</div>
