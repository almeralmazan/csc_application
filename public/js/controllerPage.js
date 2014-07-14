
var controllerPage = function() {

    var urlBase = window.location.origin;

    var init = function() {

            $('.form_date').datetimepicker({
                language:  'en',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });

            $('.form_time').datetimepicker({
                language:  'en',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
            });


            // For table filter search
            /**
             *   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables
             *   but will likely encounter performance issues on larger tables.
             *
             *  <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
             *  $(input-element).filterTable()
             *
             * The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
             */
            (function(){
                'use strict';
                var $ = jQuery;
                $.fn.extend({
                    filterTable: function(){
                        return this.each(function(){
                            $(this).on('keyup', function(e){
                                $('.filterTable_no_results').remove();
                                var $this = $(this), search = $this.val().toLowerCase(), target = $this.attr('data-filters'), $target = $(target), $rows = $target.find('tbody tr');
                                if(search == '') {
                                    $rows.show();
                                } else {
                                    $rows.each(function(){
                                        var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                    })
                                    if($target.find('tbody tr:visible').size() === 0) {
                                        var col_count = $target.find('tr').first().find('td').size();
                                        var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
                                        $target.find('tbody').append(no_results);
                                    }
                                }
                            });
                        });
                    }
                });
                $('[data-action="filter"]').filterTable();
            })(jQuery);

            $(function(){
                // attach table filter plugin to inputs
                $('[data-action="filter"]').filterTable();

                $('.container').on('click', '.panel-heading span.filter', function(e){
                    var $this = $(this),
                        $panel = $this.parents('.panel');

                    $panel.find('.panel-body').slideToggle();
                    if($this.css('display') != 'none') {
                        $panel.find('.panel-body input').focus();
                    }
                });
                $('[data-toggle="tooltip"]').tooltip();
            });


            // add schedule
            $( "#choose-this" ).click(function() {
                var date_start = $( "#picked-date-start" ).text();
                var date_end = $( "#picked-date-end" ).text();
                var time_start = $( "#picked-time-start" ).text();
                var time_end = $( "#picked-time-end" ).text();
                $( "#date-start" ).val( date_start );
                $( "#date-end" ).val( date_end );
                $( "#time-start" ).val( time_start );
                $( "#time-end" ).val( time_end );
            });


            $('#processor-form').on('submit', function(e) {
                e.preventDefault();

                getProcessorLoginInputs();
            });

            $('#admin-form').on('submit', function(e) {
                e.preventDefault();

                getAdminLoginInputs();
            });

            $('#btn-add-schedule').on('click', function() {
                var locationId = $('#testing-center-location').val();

                getAvailableScheduleForOneLocation(locationId);
            });

            $(document).on('click', 'span.selected-schedule', function() {
                var scheduleId = $(this).attr('id');

                var pickeDateStart = '#picked-date-start-'+ scheduleId;
                var pickeTimeStart = '#picked-time-start-' + scheduleId;
                var pickeTimeEnd = '#picked-time-end-' + scheduleId;

                var date_start = $(pickeDateStart).text();
                var time_start = $(pickeTimeStart).text();
                var time_end = $(pickeTimeEnd).text();

                $("#date-start").val(date_start);
                $("#time-start").val(time_start);
                $("#time-end").val(time_end);
            });

            $('#search-control-no-form').on('submit', function(e) {
                e.preventDefault();

                var controlNumber = $('#control-number-field').val();

                getApplicantStatus(controlNumber);
            });

            // delete schedule
            $('.delete-schedule').on('click', function() {
                var scheduleId = $(this).data('schedule-id'),
                    testingCenterId = $(this).data('testing-center-id');

                bootbox.confirm(
                    'Are you sure you want to delete this schedule?',
                    function(accept) {
                        if (accept) {
                            location.href = '/admin/delete/schedule/' + scheduleId + '/test-center/' + testingCenterId;
                        }
                    }
                );
            });

            // delete user
            $('.delete-user').on('click', function() {
                var name = $(this).data('name'),
                    id = $(this).data('id');

                bootbox.confirm(
                    'Are you sure you want to delete <strong>' + name + '</strong>?',
                    function(accept) {
                        if (accept) {
                            location.href = '/admin/delete/user/' + id;
                        }
                    }
                );
            });
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
        },

        getAvailableScheduleForOneLocation = function(locationId) {
            dataService.getAvailableScheduleForOneLocation(locationId)
                .done( function(data) {

                    var container = $('table tbody');
                    var html = '';

                    if (data) {

                        for (var i = 0; i < data.length; i++) {
                            html += "<tr>"
                            html += "<td><span id=" + data[i].id + " class='btn-sm btn-picker selected-schedule' data-dismiss='modal'>Pick this!</span></td>";
                            html += "<td id='picked-date-start-" + data[i].id + "'>" + data[i].date_start + "</td>";
                            html += "<td id='picked-time-start-" + data[i].id + "'>" + data[i].time_start + "</td>";
                            html += "<td id='picked-time-end-" + data[i].id + "'>" + data[i].time_end + "</td>";
                            html += "</tr>";
                        }
                    } else {
                        container.html('No')
                    }

                    container.html(html);
                })
                .fail(function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        getApplicantStatus = function(controlNumber) {
            dataService.getApplicantStatus(controlNumber)
                .done( function(data) {

                    var paidOrNotPaid = data.message[0].applicant_status;
                    var fullName = data.message[0].applicant_first_name + ' ' +
                                    data.message[0].applicant_last_name;

                    if (data.success) {

                        if (paidOrNotPaid === 1) {
                            $('#status-container #status-paid').text('Paid');
                        } else {
                            $('#status-container #status-paid').text('Not Paid');
                        }

                        $('#status-container #applicant-name').text(fullName);
                        $('#status-container #schedule-date-start').text(
                            moment(data.message[0].schedule_date_start)
                                .format('MMMM D, YYYY')
                        );
                    } else {
                        $('#status-container #status-paid').text('No results');
                        $('#status-container #applicant-name').text('No results');
                        $('#status-container #schedule-date-start').text('No results');
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        deleteUser = function(userId) {
            dataService.deleteUser(userId)
                .done( function(data) {
                    console.log('Deleted user successfully!');
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        };

    return {
        init: init
    };
}();

controllerPage.init();
