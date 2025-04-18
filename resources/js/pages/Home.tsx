import CTA from '@/components/home-components/CTA';
import Features from '@/components/home-components/Feature';
import Hero from '@/components/home-components/Hero';
import Testimonials from '@/components/home-components/Testimonial';
import React from 'react';

const Home: React.FC = () => {
    return (
        <div>
            <Hero />
            <Features />
            <Testimonials />
            <CTA />
        </div>
    );
};

export default Home;
