<template>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Vui lòng nhập thông tin của bạn</h2>
                </div>
                <div class="col-lg-8">
                    <form
                        class="form-contact contact_form"
                        action="contact_process.php"
                        method="post"
                        id="contactForm"
                        novalidate="novalidate"
                    >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea
                                        class="form-control w-100"
                                        name="message"
                                        id="message"
                                        cols="30"
                                        rows="9"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Điền thắc mắc của bạn vào đây'"
                                        placeholder="Điền thắc mắc của bạn vào đây"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input
                                        class="form-control valid"
                                        name="name"
                                        id="name"
                                        type="text"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Vui lòng nhập tên của bạn'"
                                        placeholder="Vui lòng nhập tên của bạn"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input
                                        class="form-control valid"
                                        name="email"
                                        id="email"
                                        type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Vui lòng nhập email'"
                                        placeholder="Vui lòng nhập email"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button
                                type="submit"
                                class="button button-contactForm boxed-btn"
                            >
                                Gửi thông tin
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"
                            ><i class="ti-home"></i
                        ></span>
                        <div class="media-body">
                            <h3>Hà Nội, Việt Nam</h3>
                            <p>ĐH06, ĐỨc Giang, Hoài ĐỨc</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"
                            ><i class="ti-tablet"></i
                        ></span>
                        <div class="media-body">
                            <h3>0376 318 876</h3>
                            <p>Từ thứ 2 đến thứ 6 - 8h đến 21h</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"
                            ><i class="ti-email"></i
                        ></span>
                        <div class="media-body">
                            <h3>support@gmail.com</h3>
                            <p>Gửi chúng tôi mọi thắc mắc của bạn vào đây!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
