<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="<?= base_url('users') ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-brand-600 transition-colors">
            <i class="ph-bold ph-arrow-left"></i> Back to Users
        </a>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-gray-100">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center">
                <i class="ph-bold ph-user-plus text-2xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900">Add New User</h2>
                <p class="text-sm text-gray-500 font-medium">Create a new customer profile.</p>
            </div>
        </div>
        
        <form action="<?= base_url('users/store') ?>" method="POST" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <i class="ph-bold ph-user"></i>
                    </div>
                    <input type="text" name="name" id="name" required placeholder="John Doe" class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 focus:bg-white transition-all shadow-sm outline-none">
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="<?= base_url('users') ?>" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-600 bg-white border border-gray-200 shadow-sm hover:bg-gray-50 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-brand-600 to-brand-500 shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-0.5 transition-all">Save User</button>
            </div>
        </form>
    </div>
</div>
