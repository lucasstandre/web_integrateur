// script_produit.js

document.addEventListener('DOMContentLoaded', () => {
    const basePriceElement = document.getElementById('base-price');
    const basePrice = parseFloat(basePriceElement.dataset.value);

    const ramValueElement = document.getElementById('ram-value');
    const storageValueElement = document.getElementById('storage-value');
    const cpuValueElement = document.getElementById('cpu-value');
    const totalPriceElement = document.getElementById('total-price');

    const takeInt = (text) => {
        return parseInt(text.replace(/\D/g, ''), 10);
    };
    let selectedRam = takeInt(ramValueElement.innerText); 
    let selectedStorage = takeInt(storageValueElement.innerText); 
    let selectedCpu = takeInt(cpuValueElement.innerText); 
    const configValues = {
        ram: {
            min: selectedRam,
            max: 64,
            step: 16,
            priceIncrement: 200
        },
        storage: {
            min: selectedStorage,
            max: 10000,
            step: 500,
            priceIncrement: 0.5
        },
        cpu: {
            min: selectedCpu,
            max: 2,
            step: 1,
            priceIncrement: 500
        }
    };

    const updateDisplay = () => {
        ramValueElement.innerText = `${selectedRam}GB`;
        storageValueElement.innerText = `${selectedStorage}GB`;
        cpuValueElement.innerText = `${selectedCpu}x`;
        updatePrice();
        updateButtonStates();
        ramImg();
    };

    const updatePrice = () => {
        const ramPrice = ((selectedRam - configValues.ram.min) / configValues.ram.step) * configValues.ram.priceIncrement;
        const storagePrice = (selectedStorage - configValues.storage.min) * configValues.storage.priceIncrement;
        const cpuPrice = (selectedCpu - configValues.cpu.min) * configValues.cpu.priceIncrement;

        const totalPrice = basePrice + ramPrice + storagePrice + cpuPrice;
        totalPriceElement.innerText = totalPrice.toFixed(2);
    };

    const updateButtonStates = () => {
        document.getElementById('ram-decrease').disabled = selectedRam <= configValues.ram.min;
        document.getElementById('ram-increase').disabled = selectedRam >= configValues.ram.max;

        document.getElementById('storage-decrease').disabled = selectedStorage <= configValues.storage.min;
        document.getElementById('storage-increase').disabled = selectedStorage >= configValues.storage.max;

        document.getElementById('cpu-decrease').disabled = selectedCpu <= configValues.cpu.min;
        document.getElementById('cpu-increase').disabled = selectedCpu >= configValues.cpu.max;
    };

    window.addToCart = () => {
        const config = {
            id: basePriceElement.dataset.id,
            model: basePriceElement.dataset.model,
            price: parseFloat(totalPriceElement.innerText),
            ram: `${selectedRam}GB`,
            storage: `${selectedStorage}GB`,
            cpu: `${selectedCpu}x`,
        };

        // prend les anciens produits et sacre les nouveau en push
        let cart = JSON.parse(getCookie('cart') || '[]');

        cart.push(config);

        
        setCookie('cart', JSON.stringify(cart), 1); // 1 jour

        
        alert('Product added to cart!');
    };

  
    updateDisplay(); // update 
  

    // RAM 
    document.getElementById('ram-decrease').addEventListener('click', () => {
        if (selectedRam > configValues.ram.min) {
            selectedRam -= configValues.ram.step;
            updateDisplay();
        }
    });

    document.getElementById('ram-increase').addEventListener('click', () => {
        if (selectedRam < configValues.ram.max) {
            selectedRam += configValues.ram.step;
            updateDisplay();
        }
    });

    // Storage 
    document.getElementById('storage-decrease').addEventListener('click', () => {
        if (selectedStorage > configValues.storage.min) {
            selectedStorage -= configValues.storage.step;
            updateDisplay();
        }
    });

    document.getElementById('storage-increase').addEventListener('click', () => {
        if (selectedStorage < configValues.storage.max) {
            selectedStorage += configValues.storage.step;
            updateDisplay();
        }
    });

    // CPU 
    document.getElementById('cpu-decrease').addEventListener('click', () => {
        if (selectedCpu > configValues.cpu.min) {
            selectedCpu -= configValues.cpu.step;
            updateDisplay();
        }
    });

    document.getElementById('cpu-increase').addEventListener('click', () => {
        if (selectedCpu < configValues.cpu.max) {
            selectedCpu += configValues.cpu.step;
            updateDisplay();
        }
    });
    function ramImg() {
        let ram = document.getElementById('ram-value').innerText;
        let img = document.getElementById('ramImg');
        console.log(ram);
        console.log(configValues.ram.min + 16+"GB");
        if (ram === configValues.ram.min+"GB") {
            img.src = "img/ram1.png";
        }
        else if (ram === (configValues.ram.min + 16)+"GB") {
            img.src = "img/ram2.png";
        }
        else if (ram === (configValues.ram.min + 32)+"GB") {
            img.src = "img/ram4.png";
        }

    
    }
    
});

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = `${cname}=${cvalue};${expires};path=/`;
}

function getCookie(cname) {
    let name = `${cname}=`;
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let c of ca) {
        c = c.trim();
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function deleteCookie(cname) {
    document.cookie = `${cname}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}
