
var controllerPage = function() {

    var urlBase = window.location.origin;

    var init = function() {

            $('#processor-form').on('submit', function(e) {
                e.preventDefault();

                getProcessorLoginInputs();
            });

            $('#admin-form').on('submit', function(e) {
                e.preventDefault();

                getAdminLoginInputs();
            });

//            $('#add-user-form').on('submit', function(e) {
//                e.preventDefault();
//
//                validateAddUser();
//
//                getAllUsers();
//            });
        },

        getProcessorLoginInputs = function() {
            dataService.processorLogin()
                .done( function(data) {
                    if ( ! data.success) {
                        $('.login-error')
                            .addClass('alert alert-danger')
                            .text(data.message);
                    } else {
                        window.location.href = urlBase + '/processor';
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        getAdminLoginInputs = function() {
            dataService.adminLogin()
                .done( function(data) {
                    if ( ! data.success) {
                        $('.login-error')
                            .addClass('alert alert-danger')
                            .text(data.message);
                    } else {
                        window.location.href = urlBase + '/admin';
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                   console.log(textStatus);
                });
        };

//        validateAllInputs = function() {
//            dataService.validateAllInputs()
//                .done( function(data) {
//
//                    var errorsContainer = $('#error-message');
//                    var ulContainer = $('ul#list-of-errors');
//                    var result = '';
//
//                    if ( ! data.success) {
//                        $.each(data.message, function(index, value) {
//                            result += '<li>' + value + '</li>';
//                        });
//
//                        errorsContainer.addClass('alert alert-danger');
//                        ulContainer.html(result);
//
//                        window.parent.scrollTo(0,0);
//
//                    } else {
//                        window.location.href = urlBase + '/applicant-success-page';
//                    }
//                })
//                .fail( function(jqXHR, textStatus, error) {
//                    console.log(textStatus);
//                });
//        },

//        validateAddUser = function() {
//            dataService.validateAddUser()
//                .done( function(data) {
//
//                    var errorsContainer = $('#add-user-error-message');
//                    var ulContainer = $('ul#list-of-errors');
//                    var result = '';
//
//                    if ( ! data.success) {
//                        $.each(data.message, function(index, value) {
//                            result += '<li>' + value + '</li>';
//                        });
//
//                        errorsContainer.addClass('alert alert-danger');
//                        ulContainer.html(result);
//
//                    } else {
//                        errorsContainer.removeClass('alert-danger')
//                        errorsContainer.addClass('alert-success');
//
//                        $('#name').val('');
//                        $('#username').val('');
//                        $('#password').val('');
//                        $('#password_confirmation').val('');
//
//                        errorsContainer.html(data.message);
//                    }
//                })
//                .fail( function(jqXHR, textStatus, error) {
//                    console.log(textStatus);
//                });
//        };

    return {
        init: init
    };
}();

controllerPage.init();
