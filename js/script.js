function openModal1(){
    document.getElementById('modal1').style.display = 'block';
}

function closeModal1(){
    document.getElementById('modal1').style.display = 'none';
}

function openModal2(){
    document.getElementById('modal2').style.display = 'block';
}

function closeModal2(){
    document.getElementById('modal2').style.display = 'none';
}

function openEntry(){
    document.getElementById('entry').style.display = 'block';
}

function closeEntry(){
    document.getElementById('entry').style.display = 'none';
}

function entry(){
    document.getElementById('entrys').style.display = 'flex';
    document.getElementById('doctors').style.display = 'none';
    document.getElementById('specialties').style.display = 'none';
    document.getElementById('setings').style.display = 'none';
}

function doctor(){
    document.getElementById('entrys').style.display = 'none';
    document.getElementById('doctors').style.display = 'flex';
    document.getElementById('specialties').style.display = 'none';
    document.getElementById('setings').style.display = 'none';
}

function specialt(){
    document.getElementById('entrys').style.display = 'none';
    document.getElementById('doctors').style.display = 'none';
    document.getElementById('specialties').style.display = 'flex';
    document.getElementById('setings').style.display = 'none';
}

function setting(){
    document.getElementById('entrys').style.display = 'none';
    document.getElementById('doctors').style.display = 'none';
    document.getElementById('specialties').style.display = 'none';
    document.getElementById('setings').style.display = 'flex';
}