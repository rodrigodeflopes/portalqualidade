/* ------------------------------------------------------------------------------
*
*  # Tooltips and popovers
*
*  Specific JS code additions for components_popups.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {
    
    // Override defaults selects
    $.fn.selectpicker.defaults = {
        iconBase: '',
        tickIcon: 'icon-checkmark3'
    };

    // Basic select
    $('.bootstrap-select').selectpicker();
    
       
        
    // Popovers
    // ------------------------------

	//
	// Styling
	//

	// Custom color
	$('[data-popup=popover-custom]').popover({
		template: '<div class="popover border-teal-400"><div class="arrow"></div><h3 class="popover-title bg-teal-400"></h3><div class="popover-content"></div></div>'
	});

	// Custom solid color
	$('[data-popup=popover-solid]').popover({
		template: '<div class="popover bg-primary"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
	});


	//
	// Popover events
	//

	// onShow event
	$('#popover-show').popover({
                container: 'body',
		title: 'Dados',
                html : true, 
		content: '<h6 class="text-semibold no-margin"><i class="icon-thumbs-up3 text-success position-left"></i>Conformes: 5</h6><h6 class="text-semibold no-margin"><i class="icon-thumbs-down3 text-danger position-left"></i>N. conformes: 5</h6>',
		trigger: 'click'
	}).on('show.bs.popover', function() {
		//alert('Show event fired.')
	});
        
    // Form Change
    //----------------------------
    
        $('#ItemOverviewForm').change(function(){
             $('#ItemOverviewForm').submit();
        });

	
	
});

function overView(towerId, keyName, id){    
        window.location.href = "overviewList/" + towerId + "/" + keyName + "/" + id;        
}
