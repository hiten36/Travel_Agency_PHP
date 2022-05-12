function func()
{
    let data=new URLSearchParams();
    str="";
    let c1=document.getElementById('track_inp');
    data.append("track_inp",c1.value);
    fetch("track",{
        method:"post",
        body:data
    }).then((response)=>{
        return response.text();
    }).then((data)=>{
        document.open();
        document.write(data);
        document.close();
    }).catch((error)=>{
        console.log(error);
    })
    return false;
}
document.getElementById('l1').addEventListener('click',()=>{
    if(document.getElementById('dark').classList.contains('active')){
        document.getElementById('dark').classList.remove('active');
        document.getElementById('dark').style.display='none';
        document.getElementById('light').classList.add('active');
        document.getElementById('light').style.display='block';
        document.querySelector('.navbar').classList.add('dcolor1');
        document.querySelector('.mid-i').classList.add('dcolor2');
        document.querySelector('.mid-img').classList.add('dcolor3');
        document.querySelector('.logo-a').classList.add('dcolor4');
        document.querySelector('.book-main').classList.add('dcolor2');
        document.querySelector('.confo-main').classList.add('dcolor2');
        document.querySelector('.confo-main1').classList.add('dcolor1');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.add('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.add('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.add('dcolor2');
        }
        document.querySelector('.footer').classList.add('dcolor1');
        document.querySelector('.footer').classList.add('dcolor6');
        document.querySelector('.hiten').classList.add('dcolor4');
        document.querySelector('.home2').classList.add('dcolor1');
        document.querySelector('.cm2').classList.add('dcolor2');
    }
    else
    {
        document.getElementById('dark').classList.add('active');
        document.getElementById('dark').style.display='block';
        document.getElementById('light').classList.remove('active');
        document.getElementById('light').style.display='none';
        document.querySelector('.navbar').classList.remove('dcolor1');
        document.querySelector('.mid-i').classList.remove('dcolor2');
        document.querySelector('.mid-img').classList.remove('dcolor3');
        document.querySelector('.logo-a').classList.remove('dcolor4');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.remove('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.remove('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.remove('dcolor2');
        }
        document.querySelector('.footer').classList.remove('dcolor1');
        document.querySelector('.footer').classList.remove('dcolor6');
        document.querySelector('.hiten').classList.remove('dcolor4');
        document.querySelector('.home2').classList.remove('dcolor1');
        document.querySelector('.book-main').classList.remove('dcolor2');
        document.querySelector('.confo-main').classList.remove('dcolor2');
        document.querySelector('.confo-main1').classList.remove('dcolor1');
        document.querySelector('.cm2').classList.remove('dcolor2');
    }
})