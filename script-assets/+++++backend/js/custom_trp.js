function ChangeContent(type) {
    tab_selected = type;
    switch (parseInt(type, 10)) {
        case 1:
            showCompanyInformation();
            break;
        case 2:
            showProfileSetting();
            break;
        case 3:
            showUserList();
            break;
        case 4:
            showUserForm();
            break;
        case 5:
            ShowPenddingApprove();
            break;
        case 6:
            ShowApproved();
            break;
        case 7:
            ShowRejected();
            break;

        case 8:
            ShowAllEros();
            break;
        case 9:
            ShowService();
            break;
        case 10:
            showAllService();
            break;
        case 11:
            showCompliance();
            break;
    }
}

function editEro(uid, parent) {
    var $parent = $("#" + parent);
    for (var k = 0; k < dataClient.length; k++) {
        var obj_ero = dataClient[k];
        if (obj_ero.uid == uid) {
            $parent.find("#efin").val(obj_ero.user_efin);
            $parent.find("#parent_efin").val(obj_ero.p_efin);
            $parent.find("#image_show").empty().append(obj_ero.image);
            $parent.find("#company_name").val(obj_ero.company_name);
            $parent.find("#address_1").val(obj_ero.business_addr_1);
            $parent.find("#address_2").val(obj_ero.business_addr_2);
            $parent.find("#zipcode").val(obj_ero.business_zip);
            $parent.find("#city").val(obj_ero.business_city);
            $parent.find("#state").val(obj_ero.business_state);
            (obj_ero.same_as === '1') ? $parent.find("#example-checkbox1").attr("checked", true) : $parent.find("#example-checkbox1").attr("checked", false);
            $parent.find("#address_1_m").val(obj_ero.mail_addr_1);
            $parent.find("#address_2_m").val(obj_ero.mail_addr_2);
            $parent.find("#zipcode_m").val(obj_ero.mail_zip);
            $parent.find("#city_m").val(obj_ero.mail_city);
            $parent.find("#state_m").val(obj_ero.mail_state);
            $parent.find("#tax").val(obj_ero.tax_software);
           // $parent.find("#bank_name").val(obj_ero.bank_name);
           // $parent.find("#bank_routing").val(obj_ero.bank_routing);
            //$parent.find("#bank_account").val(obj_ero.bank_account);
           // $parent.find("#addon").val(obj_ero.addon);
            //$parent.find("#file").val(obj_ero.file);
            //$parent.find("#ag").val(obj_ero.ag);
            //$parent.find("#agprep").val(obj_ero.agprep);
            $parent.find("#uid_master").val(obj_ero.uid);

            $parent.find("#username").val(obj_ero.username);
            $parent.find("#role").val(obj_ero.role);
            $parent.find("#first_name").val(obj_ero.firstname);
            $parent.find("#middle_name").val(obj_ero.middlename);
            $parent.find("#last_name").val(obj_ero.lastname);
            $parent.find("#email").val(obj_ero.mail);
            $parent.find("#phone").val(obj_ero.phone);
            $parent.find("#cell_phone").val(obj_ero.mobile);
            $parent.find("#address_1_p").val(obj_ero.address);
            $parent.find("#zipcode_p").val(obj_ero.zipcode);
            $parent.find("#city_p").val(obj_ero.city);
            $parent.find("#state_p").val(obj_ero.state);
            $parent.find("#current_p").val(obj_ero.pass);
           

        }
    }
    $parent.closest("#modal_editEro").modal('show');
}
function showEditEroModal(modal_tab) {
    $('.' + modal_tab + ' a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

}

function cancelEditModal(parent) {
     var $parent = $("#" + parent);
      $parent.find("#cancel_allero").click(function(){
         $parent.closest("#modal_editEro").modal('hide');
         return false;
    });
}


function ClickToEditEro(option, parent) {
    var $parent = $("#" + parent);
    $parent.find("#save").click(function() {
        $.post(url_base_path__ + 'admin/ero/ClickToEditEro', {
            option: option,
            senddata: 'yes',
            p_efin :  $parent.find("#parent_efin").val(),
            obj_image : objGallery,
            company_name: $parent.find("#company_name").val(),
            efin: $parent.find("#efin").val(),
            uid: $parent.find("#uid_master").val(),
            address_1: $parent.find("#address_1").val(),
            address_2: $parent.find("#address_2").val(),
            zipcode: $parent.find("#zipcode").val(),
            city: $parent.find("#city").val(),
            state: $parent.find("#state").val(),
            same_as: $parent.find("#example-checkbox1").is(':checked') ? 1 : 0,
            address_1_m: $parent.find("#address_1_m").val(),
            address_2_m: $parent.find("#address_2_m").val(),
            zipcode_m: $parent.find("#zipcode_m").val(),
            city_m: $parent.find("#city_m").val(),
            state_m: $parent.find("#state_m").val(),
            tax: $parent.find("#tax").val()
            //bank_name: $parent.find("#bank_name").val(),
            //bank_routing: $parent.find("#bank_routing").val(),
            //bank_account: $parent.find("#bank_account").val(),
            //addon: $parent.find("#addon").val(),
           // file: $parent.find("#file").val(),
            //ag: $parent.find("#ag").val(),
            //agprep: $parent.find("#agprep").val()
        }, function(data) {
            if (typeof (data) == 'object') {
                dataClient = data;
                $parent.closest("#modal_editEro").modal('hide');
            }
            loadClients();
        }, "json");

        return false;
    });
}


function clickSaveProfile(option, parent) {
    var $parent = $("#" + parent);
    $parent.find("#save_p").click(function() {
        $.post(url_base_path__ + 'admin/ero/ClickToEditEro', {
            option: option,
            load_p: 'yes',
            uid: $parent.find("#uid_master").val(),
            username: $parent.find("#username").val(),
            role: $parent.find("#role").val(),
            first_name: $parent.find("#first_name").val(),
            //middle_name: $parent.find("#middle_name").val(),
            last_name: $parent.find("#last_name").val(),
            email: $parent.find("#email").val(),
            phone: $parent.find("#phone").val(),
            cell_phone: $parent.find("#cell_phone").val(),
            //address: $parent.find("#address_1_p").val(),
            //zipcode: $parent.find("#zipcode_p").val(),
            //city: $parent.find("#city_p").val(),
            //state: $parent.find("#state_p").val(),
            //pass: $parent.find("#new_pass").val() !== "" ? $parent.find("#new_pass").val() : $parent.find("#pass").val()
        }, function(data) {
            if (typeof (data) == 'object') {
                dataClient = data;
                $parent.closest("#modal_editEro").modal('hide');
            }
            loadClients();
        }, "json");

        return false;
    });
}

function same_check(parent) {
    var $parent = $("#" + parent);
    $parent.find('#example-checkbox1').change(function() {
        if ($parent.find(this).is(":checked")) {
            $parent.find("#address_1_m").val($parent.find("#address_1").val());
            $parent.find("#address_2_m").val($parent.find("#address_2").val());
            $parent.find("#zipcode_m").val($parent.find("#zipcode").val());
            $parent.find("#city_m").val($parent.find("#city").val());
            $parent.find("#state_m").val($parent.find("#state").val());
        } else {
            $parent.find("#address_1_m").val("");
            $parent.find("#address_2_m").val("");
            $parent.find("#zipcode_m").val("");
            $parent.find("#city_m").val("");
            $parent.find("#state_m").val("");
        }
    });

}   

function changeUser(parent){
    var $parent = $("#" + parent);
    $parent.find("#change_username").click(function(){
         $parent.find('#username').removeAttr('disabled');
    });
}

function showResetPass(parent){
     var $parent = $("#" + parent);
      $parent.find("#reset_p").click(function(){
         $parent.find('#modal_reset_pass').modal('show');
    });
}

function cancelResetPass(parent){
     var $parent = $("#" + parent);
      $parent.find("#cancel_re").click(function(){
         $parent.find('#modal_reset_pass').modal('hide');
    });
}

function resetPass(parent){
     var $parent = $("#" + parent);
	 $parent.find("#save_re").click(function() {
		if($parent.find("#new_p").val() !== $parent.find("#confirm_p").val()){
			alert("New password and confirm new password is not equal");
			return false;
		}
		$.post(url_base_path__+"admin/ero/resetPassword", {
			reset_p : 'yes',
                        uid : $parent.find("#uid_master").val(),
			current_p: $parent.find("#current_p").val(),
			new_p: $parent.find("#new_p").val()
		}, function(data) {
			if (data == 'ok') {
				$parent.find('#modal_reset_pass').modal('hide');
			}else{
				alert(data);
				return false;	
			}
		}, "json");
		return false;
	});
}
var dataUser = [];
function showUserListEro() {
        var  $parent = $("#body_allero");
         $.post(url_base_path__+"admin/ero/ShowUserLists",{
             showlist:'yes',
             uid : $parent.find('#uid_master').val()
         },function(data){
            dataUser = data;
            loadUserListTab(dataUser,$parent);
         },'json');
          
       } 
function showUserListpending() {
    var $parent = $("#body_pendingero");
    $.post(url_base_path__ + "admin/ero/ShowUserLists", {
        showlist: 'yes',
        uid: $parent.find('#uid_master').val()
    }, function(data) {
        dataUser = data;
        loadUserListTab(dataUser, $parent);
    }, 'json');

} 
function showUserListApproved() {
    var $parent = $("#body_approvedero");
    $.post(url_base_path__ + "admin/ero/ShowUserLists", {
        showlist: 'yes',
        uid: $parent.find('#uid_master').val()
    }, function(data) {
        dataUser = data;
        loadUserListTab(dataUser, $parent);
    }, 'json');

} 
function loadUserListTab(data,parenttab){
    var body_id = parenttab.attr('id');
    var htm  = '';
    var heads = ["#","PTIN #","Name","Email Address","Role","User Name","Actions"];
     var htm = ''; 
            htm +='<thead>';
                        htm +='<tr>';
                            htm +='<th class="text-center">'+heads[0]+'</th>';
                            htm +='<th>'+heads[1]+'</th>';
                            htm +='<th class="hidden-xs hidden-sm">'+heads[2]+'</th>';
                            htm +='<th class="hidden-xs hidden-sm">'+ heads[3]+'</th>';
                            htm +='<th class="hidden-xs hidden-sm">'+heads[4]+'</th>';
                            htm +='<th class="hidden-xs hidden-sm">'+heads[5]+'</th>';
                            htm +='<th class="cell-small text-center"><i class="icon-bolt"></i> '+heads[6]+'</th>';
                        htm +='</tr>';
            htm +='</thead>';
            htm +='<tbody>';
            
            for(var i = 0 ; i < data.length ; i++){
                    var obj = data[i];
                    var role = (obj.rid == 5) ? "ERO" : "Admin";
                    var uid_ = obj.user_id;
                    var cid = obj.cid
                    var author = obj.author;
                     htm +='<tr>';
                     htm +='<td class="cell-small text-center">'+(i+1)+'</td>';
                     htm +='<td class="cell-small text-center">'+obj.ptin+'</td>';
                     htm +='<td><a href="javascript:void(0)">'+obj.legal_business_fname+' '+ obj.legal_business_lname +'</a></td>';
                     htm +='<td><a href="javascript:void(0)">'+obj.email+'</a></td>';
                     htm +='<td class="hidden-xs hidden-sm">'+role+'</td>'
                     htm +='<td class="hidden-xs hidden-sm">'+obj.legal_business_name+'</td>';
                    
                     htm +='<td class="text-center">';
                                htm +='<div class="btn-group">';
                                  htm += '<a class="btn btn-xs btn-success edit_user" rel="tooltip" title="Edit" data-toggle="tooltip" href="#" data-original-title="Edit" id="'+cid+'" onclick="editUser(\''+cid+'\',\''+author+'\','+body_id+')" value=""><i class="icon-pencil"></i></a>';
                                   htm += '<a class="btn btn-xs btn-danger" rel="tooltip" title="Delete" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete" id="delete_user" onclick="delete_user(\''+author+'\','+body_id+')" ><i class="icon-remove"></i></a>';
                               htm += '</div>';
                        htm += '</td>';
                   
                   htm +='</tr>';
            }
           htm +=' </tbody>';
            parenttab.find("#modal_list_user").empty().append(htm);
}

function editUser(cid, author,parent) {
    var id = $(parent).attr('id');   
    var parent_body =  $("#"+id).closest(".modal_allero").next().next("#modal_adduser");
    for (var j = 0; j < dataUser.length; j++) {
        var obj_edit = dataUser[j];
        if (cid == obj_edit.cid) {
            parent_body.find("#add_ptin").val(obj_edit.ptin);
            parent_body.find("#add_user_name").val(obj_edit.legal_business_name);
            parent_body.find("#add_first_name").val(obj_edit.legal_business_fname);
            parent_body.find("#add_last_name").val(obj_edit.legal_business_lname);
            parent_body.find("#add_email").val(obj_edit.email);
            parent_body.find("#add_password").val(obj_edit.pass);
            parent_body.find("#add_role").val(obj_edit.rid);
            parent_body.find("#cid").val(cid);
            parent_body.find("#author").val(author);
        }
    }
    parent_body.modal('show');
}

function add_new_user(parent) {
    var $parent = $("#"+parent); 
    var parent_body = $parent.closest(".modal_allero").next().next("#modal_adduser");
    parent_body.find("#save_user").click(function() {
        $.post(url_base_path__+"admin/ero/addUser", {
            add: 'yes',
            ptin: parent_body.find("#add_ptin").val(),
            first_name:parent_body.find("#add_first_name").val(),
            last_name: parent_body.find("#add_last_name").val(),
            username: parent_body.find("#add_user_name").val(),
            pass: parent_body.find("#add_password").val(),
            add_email: parent_body.find("#add_email").val(),
            role: parent_body.find("#add_role").val(),
            cid: parent_body.find("#cid").val(),
            author: parent_body.find("#author").val(),
            uid : $parent.find('#uid_master').val()

        }, function(data) {
            if (typeof(data) == 'object') {
               dataUser = data;
               parent_body.modal('hide');
               parent_body.find(":input:not(input[type='button'])").val("");
            }
            loadUserListTab(dataUser,$parent);
        }, "json");

    });

}
function showFormAddUser(parent) {
    var $parent = $("#" + parent);
    var parent_body = $parent.closest(".modal_allero").next().next("#modal_adduser");
    $parent.find("#add_new_user").click(function() {
        parent_body.find("#add_ptin").val('');
        parent_body.find("#add_user_name").val('');
        parent_body.find("#add_first_name").val('');
        parent_body.find("#add_last_name").val('');
        parent_body.find("#add_email").val('');
        parent_body.find("#add_password").val('');
        parent_body.find("#add_role").val('');
        parent_body.find("#cid").val('');
        parent_body.find("#author").val('');
        
        parent_body.modal('show');
    });
    $parent.find(".btn-cancel").click(function() {
       parent_body.modal('hide');
    });
}

function delete_user(uid,parent) {
    var id_parent = $(parent).attr('id');
    var parent_body = $("#"+id_parent);
    if (confirm('Delete this account?')) {
        $.post(url_base_path__+"admin/ero/deleteUser", {
            delete: 'yes',
            author: uid,
            uid: parent_body.find('#uid_master').val()
        }, function(data) {
            if (typeof(data) == 'object') {
                dataUser = data;
            }
            loadUserListTab(dataUser,parent_body);
        }, "json");
        return false;
    }
}

var dataService = [];
function showServicesEro() {
    var $parent = $("#body_allero");
    $.post(url_base_path__ + "admin/ero/ShowServices", {
        showservice: 'yes',
        uid: $parent.find('#uid_master').val()
    }, function(data) {
         dataService = data;
        loadServicesList(dataService, $parent);
    }, 'json');

} 
function showServicespending() {
    var $parent = $("#body_pendingero");
    $.post(url_base_path__ + "admin/ero/ShowServices", {
        showservice: 'yes',
        uid: $parent.find('#uid_master').val()
    }, function(data) {
        dataService = data;
        loadServicesList(dataService, $parent);
    }, 'json');

}

function showServicesApproved() {
    var $parent = $("#body_approvedero");
    $.post(url_base_path__ + "admin/ero/ShowServices", {
        showservice: 'yes',
        uid: $parent.find('#uid_master').val()
    }, function(data) {
         dataService = data;
        loadServicesList(dataService, $parent);  
    }, 'json');

}

function loadServicesList(data,parenttab) {

   var body_id = parenttab.attr('id');
   var heads = ["#","Service Name","Cost","SB sales price","ERO sales price","Actions"];
    var htm = '';
    htm += '<thead>';
    htm += '<tr>';
    htm += '<th class="text-center">' + heads[0] + '</th>';
    htm += '<th class="hidden-xs hidden-sm">' + heads[1] + '</th>';
    htm += '<th class="hidden-xs hidden-sm">' + heads[2] + '</th>';
    htm += '<th class="hidden-xs hidden-sm">' + heads[3] + '</th>';
    htm += '<th class="hidden-xs hidden-sm">' + heads[4] + '</th>';
    htm += '<th class="cell-small text-center"><i class="icon-bolt"></i> ' + heads[5] + '</th>';
    htm += '</tr>';
    htm += '</thead>';
    htm += '<tbody>';
    for (var i = 0; i < data.length; i++) {
        var obj = data[i];
        htm += '<tr>';
        htm += '<td class="cell-small text-center">' + (i + 1) + '</td>';
        htm += '<td class="cell-small text-center">' + obj.name + '</td>';
        htm += '<td>$' + obj.cost + '</td>';
        htm += '<td>$' + obj.sb_saleprice + '</td>';
        htm += '<td class="hidden-xs hidden-sm">$' + obj.ero_saleprice + '</td>';

        htm += '<td class="text-center">';
        htm += '<div class="btn-group">';
        htm += '<a class="btn btn-xs btn-success edit_user" rel="tooltip" title="Edit" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Edit" id="edit_service_' + obj.id + '" onclick="editService(' + obj.id + ','+body_id+')" value=""><i class="icon-pencil"></i></a>';
        htm += '<a class="btn btn-xs btn-danger" rel="tooltip" title="Delete" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete" id="deleteService" onclick="deleteService(' + obj.id + ','+body_id+')" ><i class="icon-remove"></i></a>';
        htm += '</div>';
        htm += '</td>';

        htm += '</tr>';
    }
    htm += ' </tbody>';
    parenttab.find("#modal_list_service").empty().append(htm);
}

function editService(s_id,parent) {      
   var id = $(parent).attr('id');
   var parent_body  = $("#"+id).closest(".modal_allero").next("#modal_addservice");
    for (var j = 0; j < dataService.length; j++) {
        var obj_edit = dataService[j];
        if (parseInt(s_id) == parseInt(obj_edit.id)) {
            parent_body.find("#name_service").val(obj_edit.name);
            parent_body.find("#Cost").val(obj_edit.cost);
            parent_body.find("#sb_saleprice").val(obj_edit.sb_saleprice);
            parent_body.find("#ero_saleprice").val(obj_edit.ero_saleprice);
            parent_body.find("#s_id").val(obj_edit.id);
            if (obj_edit.logo != '' && obj_edit.logo != '.')
                 parent_body.find("#tmp_logo").empty().append(obj_edit.logo);
            else {
                var img_str = '<img src="../backend/img/placeholders/image_light_160x120.png">';
                 parent_body.find("#tmp_logo").empty().append(img_str);
            }
            break;
        }
    }
   parent_body.modal('show');
}


function save_service(parent) {
   var $parent = $("#"+parent); 
   var parent_body  = $parent.closest(".modal_allero").next("#modal_addservice");
   parent_body.find("#save_service").click(function() {
        $.post(url_base_path__+"admin/ero/saveService", {
            save_service: 'yes',
            uid: $parent.find('#uid_master').val(),
            s_id: parent_body.find("#s_id").val(),
            name: parent_body.find("#name_service").val(),
            cost: parent_body.find("#Cost").val(),
            sb_saleprice: parent_body.find("#sb_saleprice").val(),
            ero_saleprice: parent_body.find("#ero_saleprice").val(),
            file_id: fileID,
            ext: extention

        }, function(data) {
            if (typeof(data) == 'object') {
                parent_body.modal('hide');
                dataService = data;
                loadServicesList(dataService,$parent);
            }
        }, "json");

        return false;
    });
}

function deleteService(s_id, parent) {
    var id_parent = $(parent).attr('id');
    var parent_body = $("#"+id_parent);
    if (confirm('Delete this service?')) {
        $.post(url_base_path__+"admin/ero/deleteService", {
            delete: 'yes',
            s_id: s_id ,
            uid: parent_body.find('#uid_master').val()
        }, function(data) {
            if (typeof(data) == 'object') {
                dataService = data;
            }
            loadServicesList(dataService,parent_body);
        }, "json");
        return false;
    }


}
function showFormAddService(parent){
    var $parent = $("#"+parent);
    var parent_body = $parent.closest(".modal_allero").next("#modal_addservice");
    $parent.find("#add_new_service").click(function(){
           parent_body.find("#name_service").val('');
            parent_body.find("#upload_service").val('');
            parent_body.find("#Cost").val('');
            parent_body.find("#sb_saleprice").val('');
            parent_body.find("#ero_saleprice").val('');
            parent_body.find("#s_id").val('');
            parent_body.modal('show');	
    });
     $parent.find(".btn-cancel").click(function(){
              parent_body.find("#modal_addservice").modal('hide');
    });
}
 