let b11=document.querySelectorAll('.bc13-p');
for(k of b11)
{
    k.addEventListener('click',(f)=>{
        let b1=f.target.parentNode.nextElementSibling.children[0].children;
        for(i of b1)
        {
            i.classList.toggle('bc-block');
            i.addEventListener('mouseover',(e)=>{
                if(e.target.tagName=='H4')
                {
                    document.querySelector('.bc-active').classList.remove('bc-active');
                    document.querySelector('.bc-flex').classList.remove('bc-flex');
                    e.target.classList.add('bc-active');
                    e.target.nextElementSibling.classList.add('bc-flex');
                }
            })
        }
    })
}
let b12=document.querySelectorAll('.sel-btn');
for(k of b12)
{
    k.addEventListener('click',(e)=>{
        let b1=e.target.parentNode.parentNode.parentNode.nextElementSibling;
        if(b1.classList.contains('bc-block'))
        {
            b1.classList.remove('bc-block');
            b1.style.display='none';
        }
        else
        {
            b1.classList.add('bc-block');
            b1.style.display='block';
            let price=e.target.parentNode.previousElementSibling.children[1].innerText.slice(2,);
            let seats=e.target.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children;
            for( i of seats)
            {
                i.addEventListener('click',(f)=>{
                    if(!f.target.classList.contains('booked_seats'))
                    {
                        if(f.target.classList.contains('seat-active'))
                        {
                            let ids=f.target.id.slice(4,);
                            f.target.classList.remove('seat-active');
                            for(j of f.target.parentNode.nextElementSibling.children[0].children[0].children[2].children)
                            {
                                if(j.innerText.includes(`UD-${ids}`))
                                {
                                    j.remove();
                                }
                            }
                            f.target.parentNode.nextElementSibling.children[0].children[1].children[1].innerText=Number(f.target.parentNode.nextElementSibling.children[0].children[1].children[1].innerText)-Number(price);
                        }
                        else
                        {
                            f.target.classList.add('seat-active');
                            let ids=f.target.id.slice(4,);
                            let nc=document.createElement('p');
                            nc.innerText=`UD-${ids}`;
                            f.target.parentNode.nextElementSibling.children[0].children[0].children[2].appendChild(nc);
                            f.target.parentNode.nextElementSibling.children[0].children[1].children[1].innerText=Number(f.target.parentNode.nextElementSibling.children[0].children[1].children[1].innerText)+Number(price);
                        }
                    }
                })
            }
        }
    })
}
let b22=document.querySelectorAll('.book-seat');
for(i of b22)
{
    i.addEventListener('click',(e)=>{
        // e.preventDefault();
        let seats=e.target.previousElementSibling.previousElementSibling.children[0].children[2];
        if(seats.innerText=='')
        {
            e.preventDefault();
        }
        else
        {
            const urlParams = new URLSearchParams(window.location.search);
            let myParam = urlParams.get('dest');
            myParam=myParam.replace('-','_');
            let str1="";
            for(j of seats.children)
            {
                str1+=`.${j.innerText}`;
            }
            let bus_id= e.target.previousElementSibling.value;
            let str=`${myParam}_${str1}_ids=${bus_id}`;
            window.location.href=`booking_confo?confo=${str}`;
        }
    })
}
const urlParams = new URLSearchParams(window.location.search);
let myParam = urlParams.get('dest');
let from=myParam.split('-')[0];
let to=myParam.split('-')[1];
document.getElementById('inp11').value=from;
document.getElementById('inp12').value=to;
document.getElementById('inp13').value=`${myParam.split('-')[2]}-${myParam.split('-')[3]}-${myParam.split('-')[4]}`;

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
        document.querySelector('.book-main1').classList.add('dcolor2');
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
        for(i of document.querySelectorAll('.book-card'))
        {
            i.classList.add('dcolor1');
        }
        for(i of document.querySelectorAll('.bc2'))
        {
            i.classList.add('dcolor7');
        }
        for(i of document.querySelectorAll('.seat-box1'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.seat-box11'))
        {
            i.classList.add('dcolor3');
        }
        for(i of document.querySelectorAll('.s-red'))
        {
            i.children[0].classList.add('dcolor3');
        }
        document.querySelector('.footer').classList.add('dcolor1');
        document.querySelector('.footer').classList.add('dcolor6');
        document.querySelector('.hiten').classList.add('dcolor4');
        document.querySelector('.home2').classList.add('dcolor1');
        document.querySelector('.logo-img').classList.add('dcolor3');
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
        document.querySelector('.book-main').classList.remove('dcolor2');
        document.querySelector('.book-main1').classList.remove('dcolor2');
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
        for(i of document.querySelectorAll('.book-card'))
        {
            i.classList.remove('dcolor1');
        }
        for(i of document.querySelectorAll('.bc2'))
        {
            i.classList.remove('dcolor7');
        }
        for(i of document.querySelectorAll('.seat-box1'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.seat-box11'))
        {
            i.classList.remove('dcolor3');
        }
        for(i of document.querySelectorAll('.s-red'))
        {
            i.children[0].classList.remove('dcolor3');
        }
        document.querySelector('.footer').classList.remove('dcolor1');
        document.querySelector('.footer').classList.remove('dcolor6');
        document.querySelector('.hiten').classList.remove('dcolor4');
        document.querySelector('.home2').classList.remove('dcolor1');
        document.querySelector('.logo-img').classList.remove('dcolor3');
    }
})