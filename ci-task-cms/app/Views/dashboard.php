<div class="mb-10 text-center sm:text-left flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-600 mb-2">Welcome Back</h1>
        <p class="text-lg text-gray-500 font-medium">Here's what's happening with your store today.</p>
    </div>
    <div class="flex items-center justify-center space-x-3 bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100">
        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
        <span class="text-sm font-semibold text-gray-700">System Online</span>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 sm:grid-cols-3">

    <a href="<?= base_url('users') ?>" class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-gradient-to-br from-brand-100 to-transparent opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors duration-300">
                <i class="ph-fill ph-users-three text-3xl"></i>
            </div>
            <i class="ph-bold ph-arrow-up-right text-gray-300 group-hover:text-brand-500 transition-colors duration-300 text-xl"></i>
        </div>
        <div class="relative z-10">
            <h3 class="text-3xl font-bold text-gray-900 mb-1">Users</h3>
            <p class="text-gray-500 font-medium text-sm">Manage your customer base</p>
        </div>
    </a>


    <a href="<?= base_url('products') ?>" class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-gradient-to-br from-blue-100 to-transparent opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                <i class="ph-fill ph-package text-3xl"></i>
            </div>
            <i class="ph-bold ph-arrow-up-right text-gray-300 group-hover:text-blue-500 transition-colors duration-300 text-xl"></i>
        </div>
        <div class="relative z-10">
            <h3 class="text-3xl font-bold text-gray-900 mb-1">Products</h3>
            <p class="text-gray-500 font-medium text-sm">Update your inventory</p>
        </div>
    </a>


    <a href="<?= base_url('transactions') ?>" class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-gradient-to-br from-emerald-100 to-transparent opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                <i class="ph-fill ph-receipt text-3xl"></i>
            </div>
            <i class="ph-bold ph-arrow-up-right text-gray-300 group-hover:text-emerald-500 transition-colors duration-300 text-xl"></i>
        </div>
        <div class="relative z-10">
            <h3 class="text-3xl font-bold text-gray-900 mb-1">Transactions</h3>
            <p class="text-gray-500 font-medium text-sm">Track recent sales</p>
        </div>
    </a>
</div>


<div class="mt-12 bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-brand-200 to-brand-100 rounded-full blur-3xl opacity-50 -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-gradient-to-tr from-blue-200 to-blue-100 rounded-full blur-3xl opacity-50 -ml-20 -mb-20"></div>
    
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-bold mb-4 border border-brand-100">
                <i class="ph-fill ph-sparkle"></i> Pro Tip
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Speed up your workflow</h2>
            <p class="text-gray-600 text-lg">Use the quick actions on the top navigation bar to seamlessly jump between managing users, updating products, and recording new transactions without losing your flow.</p>
        </div>
        <div class="hidden md:flex justify-center shrink-0">
            <div class="w-40 h-40 bg-gradient-to-tr from-brand-600 to-brand-400 rounded-3xl rotate-12 flex items-center justify-center shadow-2xl shadow-brand-500/40">
                <i class="ph-fill ph-rocket-launch text-white text-7xl -rotate-12 drop-shadow-md"></i>
            </div>
        </div>
    </div>
</div>
