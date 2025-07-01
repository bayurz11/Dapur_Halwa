<?php $__env->startSection('title', 'Profile | Dashboard Admin'); ?>
<?php $page = 'Dashboard_admin'; ?>


<?php $__env->startSection('content'); ?>
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">View Profile</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">View Profile</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <img src="assets/images/user-grid/bg_dapur_halwa.jpg" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="<?php echo e($user->photo ? asset('storage/' . $user->photo) : asset('assets/images/user-grid/user-grid-img14.png')); ?>"
                                alt="Foto Profil"
                                class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                            <h6 class="mb-0 mt-16"><?php echo e($user->name); ?></h6>
                            <span class="text-secondary-light mb-16"><?php echo e($user->email); ?></span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Personal Info</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Full Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: <?php echo e($user->name); ?></span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: <?php echo e($user->email); ?></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab"
                                    aria-controls="pills-edit-profile" aria-selected="true">
                                    Edit Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24" id="pills-change-passwork-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-change-passwork" type="button"
                                    role="tab" aria-controls="pills-change-passwork" aria-selected="false"
                                    tabindex="-1">
                                    Change Password
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                                aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <h6 class="text-md text-primary-light mb-16">Profile Image</h6>

                                <!-- Upload Image Start -->
                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload position-relative">
                                        <div
                                            class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                            <label for="photo"
                                                class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="width: 150px; height: 150px; border-radius: 50%; background-size: cover; background-position: center; background-image: url('<?php echo e($user->photo ? asset('storage/' . $user->photo) : asset('assets/images/user-grid/default.png')); ?>');">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Upload Image End -->

                                <form action="<?php echo e(route('profile_setting.update')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    

                                    <input type="file" name="photo" id="photo" class="d-none" accept="image/*"
                                        onchange="previewImage(event)">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name
                                                    <span class="text-danger-600">*</span></label>
                                                <input type="text"
                                                    class="form-control radius-8 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                                    placeholder="Enter Full Name">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="email"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                                    <span class="text-danger-600">*</span></label>
                                                <input type="email"
                                                    class="form-control radius-8 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="email" name="email"
                                                    value="<?php echo e(old('email', $user->email)); ?>"
                                                    placeholder="Enter email address">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <a href="<?php echo e(route('dashboard')); ?>"
                                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8 text-decoration-none">
                                            Cancel
                                        </a>
                                        <button type="submit"
                                            class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="pills-change-passwork" role="tabpanel"
                                aria-labelledby="pills-change-passwork-tab" tabindex="0">

                                <form action="<?php echo e(route('profile_setting.change_password')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-20">
                                        <label for="current-password"
                                            class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Current Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control radius-8 <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="current-password" name="current_password"
                                                placeholder="Enter Current Password">
                                            <button type="button"
                                                class="toggle-password position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light border-0 bg-transparent"
                                                data-toggle-target="#current-password">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-20">
                                        <label for="your-password"
                                            class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            New Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control radius-8 <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="your-password" name="new_password" placeholder="Enter New Password">
                                            <button type="button"
                                                class="toggle-password position-absolute end-0 top-50 translate-middle-y me-16 border-0 bg-transparent text-secondary-light"
                                                data-toggle-target="#your-password">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="mb-20">
                                        <label for="confirm-password"
                                            class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Confirm New Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control radius-8" id="confirm-password"
                                                name="new_password_confirmation" placeholder="Confirm New Password">
                                            <button type="button"
                                                class="toggle-password position-absolute end-0 top-50 translate-middle-y me-16 border-0 bg-transparent text-secondary-light"
                                                data-toggle-target="#confirm-password">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="submit"
                                            class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                            Change Password
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.style.backgroundImage = 'url(' + reader.result + ')';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.toggle-password');

            toggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const targetSelector = this.getAttribute('data-toggle-target');
                    const input = document.querySelector(targetSelector);

                    if (input) {
                        if (input.type === 'password') {
                            input.type = 'text';
                            this.innerHTML = '<i class="ri-eye-off-line"></i>';
                        } else {
                            input.type = 'password';
                            this.innerHTML = '<i class="ri-eye-line"></i>';
                        }
                    }
                });
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.maindashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/profile/index.blade.php ENDPATH**/ ?>