/*
LORSQUE L'ON CLIQUE SUR UN ONGLET ACTIF


*/

var tabs = document.querySelectorAll('.tabs a')

for (var i = 0; i < tabs.length; i++){
    tabs[i].addEventListener('click', function(e){
        
        var li = this.parentNode
        var div = this.parentNode.parentNode.parentNode
        
        if(li.classList.contains('active')){
            return false
        }


        //ON RETIRE LA CLASS ACTIVE DE L'ONGLET ACTIF
        div.querySelector('.tabs .active').classList.remove('active')
        //ON AJOUTE PAR LA SUITE LA CLASS ACTIVE A L'ONGLET ACTUEL
        li.classList.add('active')
        //ON RETIRE LA CLASS ACTIVE SUR LE CONTENU ACTIF
        div.querySelector('.tab-content.active').classList.remove('active')

        //J'AJOUTE LA CLASS ACTIVE SUR LE CONTENU CORRESPONDANT AU CLIC
        div.querySelector(this.getAttribute('href')).classList.add('active')

    })
}