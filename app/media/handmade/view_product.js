(function($) {
                                                        "use strict";
                                                        $(document).ready(function() {

                                                            var sync1 = $("#sync1", ".single-product-image-inner");
                                                            var sync2 = $("#sync2", ".single-product-image-inner");
                                                            sync1.owlCarousel({
                                                                singleItem: true,
                                                                slideSpeed: 100,
                                                                navigation: true,
                                                                pagination: false,
                                                                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                                                                afterAction: syncPosition,
                                                                responsiveRefreshRate: 200
                                                            });

                                                            sync2.owlCarousel({
                                                                items: 4,
                                                                itemsDesktop: [1199, 4],
                                                                itemsDesktopSmall: [980, 3],
                                                                itemsTablet: [768, 3],
                                                                itemsTabletSmall: false,
                                                                itemsMobile: [479, 2],
                                                                pagination: false,
                                                                responsiveRefreshRate: 100,
                                                                navigation: false,
                                                                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                                                                afterInit: function(el) {
                                                                    el.find(".owl-item").eq(0).addClass("synced");
                                                                }
                                                            });

                                                            function syncPosition(el) {
                                                                var current = this.currentItem;
                                                                $("#sync2")
                                                                    .find(".owl-item")
                                                                    .removeClass("synced")
                                                                    .eq(current)
                                                                    .addClass("synced");
                                                                if ($("#sync2").data("owlCarousel") !== undefined) {
                                                                    center(current);
                                                                }
                                                            }

                                                            $("#sync2").on("click", ".owl-item", function(e) {
                                                                e.preventDefault();
                                                                var number = $(this).data("owlItem");
                                                                sync1.trigger("owl.goTo", number);
                                                            });

                                                            function center(number) {
                                                                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                                                                console.log(sync2.data("owlCarousel"));
                                                                var num = number;
                                                                var found = false;
                                                                for (var i in sync2visible) {
                                                                    if (num === sync2visible[i]) {
                                                                        var found = true;
                                                                    }
                                                                }

                                                                if (found === false) {
                                                                    if (num > sync2visible[sync2visible.length - 1]) {
                                                                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                                                                    } else {
                                                                        if (num - 1 === -1) {
                                                                            num = 0;
                                                                        }
                                                                        sync2.trigger("owl.goTo", num);
                                                                    }
                                                                } else if (num === sync2visible[sync2visible.length - 1]) {
                                                                    sync2.trigger("owl.goTo", sync2visible[1])
                                                                } else if (num === sync2visible[0]) {
                                                                    sync2.trigger("owl.goTo", num - 1)
                                                                }
                                                            }


                                                            $(document).on('change', '.variations_form .variations select,.variations_form .variation_form_section select,div.select', function() {
                                                                var variation_form = $(this).closest('.variations_form');
                                                                var current_settings = {},
                                                                    reset_variations = variation_form.find('.reset_variations');
                                                                variation_form.find('.variations select,.variation_form_section select').each(function() {
                                                                    // Encode entities
                                                                    var value = $(this).val();

                                                                    // Add to settings array
                                                                    current_settings[$(this).attr('name')] = jQuery(this).val();
                                                                });

                                                                variation_form.find('.variation_form_section div.select input[type="hidden"]').each(function() {
                                                                    // Encode entities
                                                                    var value = $(this).val();

                                                                    // Add to settings array
                                                                    current_settings[$(this).attr('name')] = jQuery(this).val();
                                                                });

                                                                var all_variations = variation_form.data('product_variations');

                                                                var variation_id = 0;
                                                                var match = true;

                                                                for (var i = 0; i < all_variations.length; i++) {
                                                                    match = true;
                                                                    var variations_attributes = all_variations[i]['attributes'];
                                                                    for (var attr_name in variations_attributes) {
                                                                        var val1 = variations_attributes[attr_name];
                                                                        var val2 = current_settings[attr_name];
                                                                        if (val1 == undefined || val2 == undefined) {
                                                                            match = false;
                                                                            break;
                                                                        }
                                                                        if (val1.length == 0) {
                                                                            continue;
                                                                        }

                                                                        if (val1 != val2) {
                                                                            match = false;
                                                                            break;
                                                                        }
                                                                    }
                                                                    if (match) {
                                                                        variation_id = all_variations[i]['variation_id'];
                                                                        break;
                                                                    }
                                                                }

                                                                if (variation_id > 0) {
                                                                    var index = parseInt($('a[data-variation_id*="|' + variation_id + '|"]', '#sync1').data('index'), 10);
                                                                    if (!isNaN(index)) {
                                                                        sync1.trigger("owl.goTo", index);
                                                                    }
                                                                }
                                                            });

                                                        });
                                                    })(jQuery);