import React, { useState, useEffect } from 'react';

const Slider = () => {
const [index, setIndex] = useState(0);
const totalSlides = 9;

const goToNextSlide = () => {
setIndex((prevIndex) => (prevIndex + 1) % totalSlides);
};

const goToPreviousSlide = () => {
setIndex((prevIndex) => (prevIndex - 1 + totalSlides) % totalSlides);
};

useEffect(() => {
const intervalId = setInterval(goToNextSlide, 3000);

return () => clearInterval(intervalId);
}, []);

return (
<div className="slider-container">
    <div className="slider" style={{ transform: `translateX(-${index * 100}%)` }}>

        {[1, 2, 3, 4, 5, 6, 7, 8, 9].map((slideNumber) => (
        <div key={slideNumber} className="slide">
            <img src={`slide${slideNumber}.jpg`} alt={`Image ${slideNumber}`} />
        </div>
        ))}
    </div>
    <button className="btn prev" onClick={goToPreviousSlide}>
        Previous
    </button>
    <button className="btn next" onClick={goToNextSlide}>
        Next
    </button>
</div>
);
};

const App = () => {
return (
<div>
    <header>
        <h1>به وبسایت معرفی فیلم خوش آمدید</h1>
    </header>
    <Slider />

    <footer>
        تماس با ما
        <p>فیلم های پسندیده شده</p>
        <p>ورود کاربران</p>
    </footer>
</div>
);
};

export default App;
