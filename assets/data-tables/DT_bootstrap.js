$.extend(!0,$.fn.dataTable.defaults,{sDom:"<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",sPaginationType:"bootstrap",oLanguage:{sLengthMenu:"_MENU_ records per page"}}),$.extend($.fn.dataTableExt.oStdClasses,{sWrapper:"dataTables_wrapper form-inline"}),$.fn.dataTableExt.oApi.fnPagingInfo=function(a){return{iStart:a._iDisplayStart,iEnd:a.fnDisplayEnd(),iLength:a._iDisplayLength,iTotal:a.fnRecordsTotal(),iFilteredTotal:a.fnRecordsDisplay(),iPage:Math.ceil(a._iDisplayStart/a._iDisplayLength),iTotalPages:Math.ceil(a.fnRecordsDisplay()/a._iDisplayLength)}},$.extend($.fn.dataTableExt.oPagination,{bootstrap:{fnInit:function(a,e,i){var t=a.oLanguage.oPaginate,l=function(e){e.preventDefault(),a.oApi._fnPageChange(a,e.data.action)&&i(a)};$(e).addClass("pagination").append('<ul><li class="prev disabled"><a href="#">&larr; '+t.sPrevious+'</a></li><li class="next disabled"><a href="#">'+t.sNext+" &rarr; </a></li></ul>");var n=$("a",e);$(n[0]).bind("click.DT",{action:"previous"},l),$(n[1]).bind("click.DT",{action:"next"},l)},fnUpdate:function(a,e){var i,t,l,n,o,s=a.oInstance.fnPagingInfo(),r=a.aanFeatures.p,d=Math.floor(2.5);for(s.iTotalPages<5?(n=1,o=s.iTotalPages):s.iPage<=d?(n=1,o=5):s.iPage>=s.iTotalPages-d?(n=s.iTotalPages-5+1,o=s.iTotalPages):o=(n=s.iPage-d+1)+5-1,i=0,iLen=r.length;i<iLen;i++){for($("li:gt(0)",r[i]).filter(":not(:last)").remove(),t=n;t<=o;t++)l=t==s.iPage+1?'class="active"':"",$("<li "+l+'><a href="#">'+t+"</a></li>").insertBefore($("li:last",r[i])[0]).bind("click",function(i){i.preventDefault(),a._iDisplayStart=(parseInt($("a",this).text(),10)-1)*s.iLength,e(a)});0===s.iPage?$("li:first",r[i]).addClass("disabled"):$("li:first",r[i]).removeClass("disabled"),s.iPage===s.iTotalPages-1||0===s.iTotalPages?$("li:last",r[i]).addClass("disabled"):$("li:last",r[i]).removeClass("disabled")}}}}),$.fn.DataTable.TableTools&&($.extend(!0,$.fn.DataTable.TableTools.classes,{container:"DTTT btn-group",buttons:{normal:"btn",disabled:"disabled"},collection:{container:"DTTT_dropdown dropdown-menu",buttons:{normal:"",disabled:"disabled"}},print:{info:"DTTT_print_info modal"},select:{row:"active"}}),$.extend(!0,$.fn.DataTable.TableTools.DEFAULTS.oTags,{collection:{container:"ul",button:"li",liner:"a"}}));