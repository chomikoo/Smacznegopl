(function () {
    'use strict'

    console.log('Hello from calculators.js');

    // TABS
    function closeTabs() {
        [...document.querySelectorAll('.calculator')].map( elem => { elem.classList.remove('tabs--current')});
        [...document.querySelectorAll('.tabs__nav')].map( elem => { elem.classList.remove('tabs__nav--active')});
    }

    function openTab(hash, target) {
        closeTabs();
        document.querySelector(hash).classList.add('tabs--current');
        target.classList.add('tabs__nav--active');
    }

    const tabsBtnsArr = [...document.querySelectorAll('.tabs__nav')];
    tabsBtnsArr.map((element, i) => {
        element.addEventListener('click', (e)=>{
            e.preventDefault();
            openTab(e.target.hash, e.target);
        });
    })


    const calculator = [...document.querySelectorAll('form')];

    calculator.map((element, i) => {
        element.addEventListener('focus', function (event) {
            event.target.parentNode.classList.add('calculator__group--focus');
        }, true);

        element.addEventListener('blur', event => {
            if (!event.target.value) {
                event.target.parentNode.classList.remove('calculator__group--focus');
            } 
        }, true);
    });

    ///////////////////  
    // BMI
    ///////////////////

    const bmiBtn = document.getElementById('bmiBtn');
    bmiBtn.addEventListener('click', event => {
        event.preventDefault();
        bmiCalc();
    });

    function bmiCalc() {

        let comment = document.getElementById('bmiComment');
    
        // let gender = document.querySelector('input[name="gender"]:checked').value;
        let height = document.getElementById('bmiHeight').value / 100;
        let weight = document.getElementById('bmiWeight').value;

        let bmi = Math.floor(weight / Math.pow(height, 2));

        let commentText = '';
        let color = 'green';

        if (bmi < 18.5) {
            commentText = 'Niedowaga';
            color = "blue";
        } else if (bmi >= 18.5 && bmi <= 25) {
            commentText = 'W normie';
            color = 'green';
        } else if (bmi >= 25 && bmi <= 30) {
            commentText = 'Otyłość';
            color = 'red';
        } else if (bmi > 30) {
            commentText = 'Nadwaga';
            color = 'black';
        }

        console.log(`BMI  H ${height} W ${weight} BMI ${bmi} Comment ${commentText} Color ${color}`);

        comment.style.color = color;
        comment.innerHTML = commentText;
    
    }

    ///////////////////
    //  BMR 
    ///////////////////

    const bmrBtn = document.getElementById('bmrBtn');
    bmrBtn.addEventListener('click', event => {
        event.preventDefault();
        bmrCalc();
    });

    function bmrCalc() {
        let comment = document.getElementById('bmrComment');
    
        let gender = document.querySelector('input[name="bmr_gender"]:checked').value;
        let height = document.getElementById('bmrHeight').value;
        let weight = document.getElementById('bmrWeight').value;
        let age = document.getElementById('bmrAge').value;

        let activity = document.getElementById('bmr_activity').value;

        let ppm = 0;

        
        if ( gender == 'f') {
            ppm =  66.47 + (13.75 * weight) + (5 * height) - (6.75 * age);

        } else if ( gender === 'm' ) {
            ppm = 665.09 + (9.56 * weight) + (1.85 * height) - (4.67 * age);
        }
        
        let bmr = ppm * activity;

        console.log(`BMR G ${gender} H ${height} W ${weight} Age ${age} Activity ${activity} PPM ${Math.floor(ppm)} BMR ${Math.floor(bmr)}`);

        const commentHtml = `
            <span>Podstawowa przemiana materii: ${Math.floor(ppm)} kcal</span><br>
            <span>Całkowita przemiana materii: ${Math.floor(bmr)} kcal</span>
        `;

        comment.innerHTML = commentHtml;
    }

    ///////////////////
    // Perfect Weight
    ///////////////////

    const pwBtn = document.getElementById('pwBtn');
    pwBtn.addEventListener('click', function (e) {
        e.preventDefault();
        pwCalc();
    });

    function pwCalc() {

        let comment = document.getElementById('pwComment');
        let gender = document.querySelector('input[name="pw_gender"]:checked').value;
        let height = document.getElementById('pwHeight').value;
        let pw = 0;
  
        if ( gender == 'f') {
            pw =  height - 100 - ((height - 150) / 2);
        } else if ( gender === 'm' ) {
            pw = height - 100 - ((height - 150) / 4);
        }

        console.log(`BW G ${gender} H ${height} PW ${pw}`);

        const commentHtml = `
            <span>Idealna waga: ${pw.toFixed(1)} kg</span>
        `;

        comment.innerHTML = commentHtml;
    }
    ///////////
    // Body Fat 
    ///////////

    const bfBtn = document.getElementById('bfBtn');
    bfBtn.addEventListener('click', function (e) {
        e.preventDefault();
        bfCalc();
    });

    [...document.querySelectorAll('#bfForm .radio__input')].map(elem => {
        elem.addEventListener('change', (event) => {
            console.log(event.target.value);
            if(event.target.value === 'f') {
                document.getElementById('bfHip').parentNode.classList.remove('d-none');
            } else {
                document.getElementById('bfHip').parentNode.classList.add('d-none');
            }
        })
    });

    function bfCalc() {
        let comment = document.getElementById('bfComment');
    
        let gender = document.querySelector('input[name="bf_gender"]:checked').value;
        let heightVal = document.getElementById('bfHeight').value;
        let weightVal = document.getElementById('bfWeight').value;

        let waistVal = document.getElementById('bfWaist').value;
        let hipVal = document.getElementById('bfHip').value;
        let neckVal = document.getElementById('bfNeck').value;



        let bf = 0;

        if ( gender === 'f') {
            // bf = Math.floor(weight / (163.205 * Math.log10(waist + hip - neck) - 97.684 * Math.log10(height) - 78.387) * 100); // for woman
            bf = Math.floor(495 / ( 1.29579 - 0.35004 * Math.log10( waistVal + hipVal - neckVal ) + 0.22100 * Math.log10( heightVal ) ) - 450);
        } else if ( gender === 'm' ) {
            // bf = Math.floor(weight / (86.010 * Math.log10( waist - neck ) - 70.041 * Math.log10(height + 36.76)) * 100); // for man
            bf = Math.floor(495 / ( 1.0324 - 0.19077 * Math.log10( waistVal - neckVal ) + 0.15456 * Math.log10( heightVal ) ) - 450);
        }

        console.log(`BF G ${gender} H ${heightVal} W ${waistVal} H ${hipVal} N ${neckVal} BF ${bf.toFixed(1)}`);

        const commentHtml = `
            <span>Procent tkanki tłuszczowej: ${bf} %</span><br>
            <span>Co stanowi ok. ${bf*weightVal/100} kg całkowitej masy ciała.</span>
        `;

        comment.innerHTML = commentHtml;
    }



})();