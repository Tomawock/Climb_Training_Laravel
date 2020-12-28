function download() {
    const { jsPDF } = window.jspdf;
    
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

    doc.save('Become_A_Better_Climber_'+title+'.pdf');
}

function feedbackPositive(status,msg) {
    toastr.options.closeButton = true;
    if (status){
        toastr.success(msg,'', {timeOut: 4000});
    } 
}

function checkboxOnsubmit(form){
    //consente il mantenimento e l'invio delle info delle checbox
    //anche se le checkbox son preenti su pagine diverse
    var rows_selected = $('#searchandordercheck').DataTable().column(6).checkboxes.selected();
    // Iterate over all selected checkboxes
    $.each(rows_selected, function (index, rowId) {

        var res; 
        if(!(rowId.indexOf("checked") === -1)){   
            res = rowId.substring(0,rowId.length - 7); 
        }else{
            res=rowId;
        }
//        console.log(res)
        $(form).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', res)
                .val(res)
                );
    });
    return true;
}

$(document).ready(function () {
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
        language: datatableLang,
        stateSave: true
    };
    var optionscheck={
       dom:'rtpi',
        ordering: false,
        info: false,
        lengthChange: false,
        pageLength: 10,
        language: datatableLang,
      columnDefs: [
         {
            targets: 6,
            checkboxes: {
               selectRow: true,
               selectAll: false
            }
         }
      ],
      select: {
         style: 'multi'
      } 
   }
    

    var mytable;
    
    mytable = $('#searchandorder').DataTable(options);
    //creo una tabella con caratteristiche speciali per usare le checkbox con essa in modo semplice
    var table = $('#searchandordercheck').DataTable(optionscheck);
   
   //appena il documento è caricato,nel capso in cui abbiamo una tabella con checkbox
   //si settano se presenti le eventuali spunte sulle chebox già presenti
   $(table.rows()).each( function () {
        //per ogni riga prendi la cella e tira fuori il nome cosi poi dopo se è cheked lo imposti 
        //come cheked anhe nella checbox effettiva
        $(this).each(function(){
            if(table.cell($(this),6).data().indexOf("checked") === -1){   
                //console.log("NOT MATCH")
            }
            else{
                table.cell($(this),6).checkboxes.select(true);
            }
        });
            
    });
    
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