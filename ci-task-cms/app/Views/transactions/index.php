<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-bold mb-3 border border-emerald-100">
            <i class="ph-fill ph-receipt"></i> Sales Records
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900">Transactions</h1>
        <p class="mt-2 text-md text-gray-500">Track and manage recent product purchases.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="<?= base_url('transactions/create') ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:-translate-y-0.5 transition-all duration-300">
            <i class="ph-bold ph-plus"></i> New Transaction
        </a>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 overflow-x-auto">
        <table class="datatable nowrap min-w-full divide-y divide-gray-100">
            <thead>
                <tr class="bg-gray-50/50">
                    <th scope="col" class="py-4 pl-6 pr-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Trx ID</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product Info</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Payment</th>
                    <th scope="col" class="relative py-4 pl-3 pr-6 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 bg-white">
                <?php foreach ($transactions as $t): ?>
                <tr class="hover:bg-emerald-50/30 transition-colors duration-150 group">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-semibold text-gray-900">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">
                            #<?= $t['transaction_id'] ?>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-700">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                <?= strtoupper(substr($t['user_name'], 0, 1)) ?>
                            </div>
                            <?= esc($t['user_name']) ?>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
                        <div class="font-medium text-gray-900"><?= esc($t['product_name']) ?></div>
                        <div class="text-gray-500 text-xs">Qty: <?= esc($t['qty']) ?> &times; Rp <?= number_format($t['price'], 0, ',', '.') ?></div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-bold text-gray-900">
                        Rp <?= number_format($t['qty'] * $t['price'], 0, ',', '.') ?>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <?= esc($t['payment_method']) ?>
                        </span>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-3 opacity-70 group-hover:opacity-100 transition-opacity">
                            <a href="<?= base_url('transactions/delete/'.$t['transaction_id']) ?>" class="btn-delete p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors" data-confirm-msg="Yakin ingin membatalkan transaksi ini?" title="Delete">
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
