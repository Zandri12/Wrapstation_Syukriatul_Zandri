<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-bold mb-3 border border-brand-100">
            <i class="ph-fill ph-users"></i> Users Management
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900">Registered Users</h1>
        <p class="mt-2 text-md text-gray-500">View and manage all users registered in the system.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="<?= base_url('users/create') ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-0.5 transition-all duration-300">
            <i class="ph-bold ph-plus"></i> Add New User
        </a>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 overflow-x-auto">
        <table class="datatable nowrap min-w-full divide-y divide-gray-100">
            <thead>
                <tr class="bg-gray-50/50">
                    <th scope="col" class="py-4 pl-6 pr-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">User ID</th>
                    <th scope="col" class="px-3 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Full Name</th>
                    <th scope="col" class="py-4 pl-3 pr-6 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 bg-white">
                <?php foreach ($users as $user): ?>
                <tr class="hover:bg-brand-50/30 transition-colors duration-150 group">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-semibold text-gray-900">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold text-xs">
                                #<?= $user['user_id'] ?>
                            </div>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-700 group-hover:text-brand-700 transition-colors">
                        <?= esc($user['name']) ?>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-3 opacity-70 group-hover:opacity-100 transition-opacity">
                            <a href="<?= base_url('users/edit/'.$user['user_id']) ?>" class="p-2 text-brand-600 bg-brand-50 rounded-lg hover:bg-brand-100 hover:text-brand-700 transition-colors" title="Edit">
                                <i class="ph-bold ph-pencil-simple text-lg"></i>
                            </a>
                            <a href="<?= base_url('users/delete/'.$user['user_id']) ?>" class="btn-delete p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors" data-confirm-msg="Yakin ingin menghapus pengguna ini?" title="Delete">
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
