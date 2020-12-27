function download() {
    
    var doc = new jsPDF('l', 'pt', 'a4');

    var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
    var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();

    doc.setFontSize(20);
    var title=document.getElementById("title").innerHTML.trim();
    var lineHeight = doc.getLineHeight(title) / doc.internal.scaleFactor;
    var splittedTextTitle = doc.splitTextToSize(title, pageWidth-40 );
    var lines = splittedTextTitle.length  // splitted text; is a string array
    var blockHeightTitle = lines * lineHeight;
    
    doc.setFontSize(20);
    var time =document.getElementById("time").innerHTML.trim()
    var lineHeight = doc.getLineHeight(time) / doc.internal.scaleFactor;
    var splittedTextTime = doc.splitTextToSize(time, pageWidth-40 );
    var lines = splittedTextTime.length  // splitted text; is a string array
    var blockHeightTimes = lines * lineHeight;
    
    doc.setFontSize(10);
    var desc = document.getElementById("description").innerHTML.trim();
    var lineHeight = doc.getLineHeight(desc) / doc.internal.scaleFactor;
    var splittedTextDesc = doc.splitTextToSize(desc, pageWidth-60 );
    var lines = splittedTextDesc.length  // splitted text; is a string array
    var blockHeightDesc = lines * lineHeight;
    
    var yPos = 30;
    var xPos = pageWidth / 2;
    doc.setFontSize(20);
    doc.text(xPos, yPos, splittedTextTitle,'center');
    yPos += blockHeightTitle;
    doc.setFontSize(20);
    doc.text(xPos, yPos, splittedTextTime,'center');
    yPos += blockHeightTimes;
    doc.setFontSize(10);
    doc.text(xPos, yPos, splittedTextDesc,'center');
    yPos += blockHeightDesc;
    
    jsPDF.autoTableSetDefaults({
        headStyles: {fillColor: 0},
        columnStyles: {halign: 'center'},
    });

    doc.autoTable({
        html: '#toDowload',
        startY: yPos
    });

    doc.save('Training_'+title+'.pdf');
}

function feedbackPositive(status,msg) {
    toastr.options.closeButton = true;
    if (status){
        toastr.success(msg,'', {timeOut: 4000});
    } 
}

$(document).ready(function () {
    //syncronus request
//    $.ajax({
//        url: "/ajax-lang",
//        type:"GET",
//        data:{
//          
//        },
//        success:function(response){     
//          if(response) {
//           console.log(response.success);
//          }
//        },
//       });
    //load the json file from sever that contains the language for Datatable
    var datatableLang = $.parseJSON($.ajax({
        url:  '/ajaxdatatablelanguage',
        type:"GET",
        dataType: "json", 
        async: false
    }).responseText);
    //define Datatable option before creating it 
    var options = {
        dom:'rtpi',
        ordering: false,
        info: false,
        lengthChange: false,
        pageLength: 10,
        language: datatableLang
    };

    var mytable;
    mytable = $('#searchandorder').DataTable(options);
    
    $('#filter-owner').change(function(){
        
        mytable.columns( $(this).data('column') )
                .search( $(this).children("option:selected").val() )
                .draw();
    });
    
    $('#filter-title').keyup(function(){
        mytable.columns( $(this).data('column') )
                .search( $(this).val() )
                .draw();
    });
    
    $('#filter-description').keyup(function(){
        mytable.columns( $(this).data('column') )
                .search( $(this).val() )
                .draw();
    });
    
});