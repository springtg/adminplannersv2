/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include('script/quayso_ngaokiem/FormLogin_.js');
include('script/quayso_ngaokiem/FormAccount.js');
include('script/quayso_ngaokiem/FormAuthority.js');
include('script/quayso_ngaokiem/FormProduct.js');
include('script/quayso_ngaokiem/FormProductHistory.js');
//----Include-Function----
function include(url){ 
  document.write('<script type="text/javascript" src="'+base_url+ url +'" ></script>'); 
}