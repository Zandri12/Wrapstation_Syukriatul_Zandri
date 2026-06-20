<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Pro - Premium</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce',
                            800: '#6b21a8',
                            900: '#581c87',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.5s ease-out',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb { background: #d8b4fe; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #a855f7; }
        

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }


        table.dataTable.nowrap th, table.dataTable.nowrap td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            background-color: transparent !important;
            color: #374151 !important;
        }
        table.dataTable thead th {
            color: #6b7280 !important;
            font-weight: 700 !important;
            border-bottom: 2px solid #f3f4f6 !important;
        }
        .dt-container {
            padding: 1.5rem;
            color: #374151 !important;
        }
        .dt-search input, .dt-length select {
            border-radius: 0.5rem !important;
            border: 1px solid #e5e7eb !important;
            padding: 0.5rem 1rem !important;
            font-size: 0.875rem !important;
            background-color: #ffffff !important;
            color: #111827 !important;
            background-image: none !important;
        }
        .dt-search input:focus, .dt-length select:focus {
            outline: none !important;
            border-color: #a855f7 !important;
            box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.2) !important;
        }
        .dt-paging-button {
            background-color: #ffffff !important;
            color: #374151 !important;
            border-radius: 0.5rem !important;
            margin: 0 0.1rem !important;
            border: 1px solid #e5e7eb !important;
        }
        .dt-paging-button:hover:not(.current):not(.disabled) {
            background-color: #f3f4f6 !important;
            color: #111827 !important;
        }
        .dt-paging-button.current {
            background: #a855f7 !important;
            color: #ffffff !important;
            border-color: #a855f7 !important;
        }
        .dt-paging-button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .select2-container .select2-selection--single {
            height: 3rem !important;
            border-radius: 0.75rem !important;
            border: 1px solid #e5e7eb !important;
            background-color: #f9fafb !important;
            padding: 0.5rem 1rem 0.5rem 2.75rem !important;
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #111827 !important;
            line-height: normal !important;
            padding-left: 0 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100% !important;
            right: 1rem !important;
        }
        .select2-dropdown {
            border-radius: 0.75rem !important;
            border: 1px solid #e5e7eb !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
            overflow: hidden;
            z-index: 9999;
        }
        .select2-search__field {
            border-radius: 0.5rem !important;
            border: 1px solid #e5e7eb !important;
            padding: 0.5rem !important;
            outline: none !important;
        }
        .select2-search__field:focus {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2) !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-brand-50 via-white to-brand-100 text-gray-800 font-sans min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">


    <div class="fixed w-full z-50 top-0 pt-4 px-4 sm:px-6 lg:px-8">
        <nav class="glass max-w-7xl mx-auto rounded-2xl shadow-sm border border-white/60 transition-all duration-300 hover:shadow-md">
            <div class="px-6">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center gap-2 group cursor-pointer">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center text-white shadow-lg shadow-brand-500/30 group-hover:shadow-brand-500/50 transition-all duration-300 group-hover:scale-105">
                                <i class="ph-bold ph-cube text-2xl"></i>
                            </div>
                            <span class="font-bold text-xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-brand-700 to-brand-500 ml-2">CMS Pro</span>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:space-x-2">
                        <a href="<?= base_url() ?>" class="text-gray-600 hover:text-brand-600 hover:bg-brand-50 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2">
                            <i class="ph-bold ph-squares-four text-lg"></i> Dashboard
                        </a>
                        <a href="<?= base_url('users') ?>" class="text-gray-600 hover:text-brand-600 hover:bg-brand-50 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2">
                            <i class="ph-bold ph-users text-lg"></i> Users
                        </a>
                        <a href="<?= base_url('products') ?>" class="text-gray-600 hover:text-brand-600 hover:bg-brand-50 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2">
                            <i class="ph-bold ph-package text-lg"></i> Products
                        </a>
                        <a href="<?= base_url('transactions') ?>" class="text-gray-600 hover:text-brand-600 hover:bg-brand-50 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2">
                            <i class="ph-bold ph-receipt text-lg"></i> Transactions
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-32 pb-12 animate-fade-in-up">
        <?= $content ?>
    </main>


    <footer class="mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center gap-2">
            <div class="w-12 h-1 rounded-full bg-gradient-to-r from-brand-300 to-brand-500 opacity-50 mb-2"></div>
            <p class="text-center text-sm font-medium text-gray-400">
                &copy; <?= date('Y') ?> <span class="text-brand-600">CMS Pro</span>. Built with precision.
            </p>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: "4000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };

            <?php if (session()->getFlashdata('success')): ?>
                toastr.success("<?= addslashes(session()->getFlashdata('success')) ?>", "Berhasil!");
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                toastr.error("<?= addslashes(session()->getFlashdata('error')) ?>", "Gagal!");
            <?php endif; ?>
            <?php if (session()->getFlashdata('warning')): ?>
                toastr.warning("<?= addslashes(session()->getFlashdata('warning')) ?>", "Peringatan!");
            <?php endif; ?>
            <?php if (session()->getFlashdata('info')): ?>
                toastr.info("<?= addslashes(session()->getFlashdata('info')) ?>", "Info");
            <?php endif; ?>

            $('.datatable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records..."
                }
            });

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                const msg = $(this).data('confirm-msg') || 'Yakin ingin menghapus data ini?';

                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: msg,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#9ca3af',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'rounded-xl px-4 py-2 text-sm font-bold shadow-sm',
                        cancelButton: 'rounded-xl px-4 py-2 text-sm font-bold shadow-sm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            $('.select2-searchable').select2({
                width: '100%',
            });
        });
    </script>
</body>
</html>
