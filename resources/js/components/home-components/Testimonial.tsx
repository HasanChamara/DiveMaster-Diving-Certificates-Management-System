import React from 'react';

interface TestimonialProps {
    content: string;
    author: string;
    role: string;
    image: string;
}

const Testimonial: React.FC<TestimonialProps> = ({ content, author, role, image }) => {
    return (
        <div className="rounded-lg border border-gray-100 bg-white p-8 shadow-lg">
            <div className="mb-4 flex items-center">
                <img src={image} alt={author} className="mr-4 h-12 w-12 rounded-full object-cover" />
                <div>
                    <h4 className="font-medium text-slate-900">{author}</h4>
                    <p className="text-sm text-gray-500">{role}</p>
                </div>
            </div>
            <p className="leading-relaxed text-gray-600 italic">{content}</p>
        </div>
    );
};

const Testimonials: React.FC = () => {
    const testimonials = [
        {
            content:
                'DiveMaster has completely transformed how our dive center manages certifications. The automated verification system has saved us countless hours and eliminated paperwork.',
            author: 'Sarah Johnson',
            role: 'PADI Course Director',
            image: 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=150',
        },
        {
            content:
                "As someone who manages a large dive operation, I can't imagine going back to our old system. DiveMaster gives us real-time access to all our certification data from anywhere in the world.",
            author: 'Michael Rodriguez',
            role: 'Dive Center Owner',
            image: 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=150',
        },
        {
            content:
                'The analytics dashboard helps me track instructor performance and identify which courses are most popular. This data has been invaluable for growing our business.',
            author: 'Emma Chen',
            role: 'Diving School Manager',
            image: 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=150',
        },
    ];

    return (
        <section className="bg-gradient-to-b from-teal-900 to-slate-900 py-16 text-white">
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div className="mb-16 text-center">
                    <h2 className="mb-4 text-3xl font-bold md:text-4xl">Trusted by Diving Professionals Worldwide</h2>
                    <p className="mx-auto max-w-3xl text-xl text-teal-100">
                        Hear what our customers have to say about their experience with DiveMaster.
                    </p>
                </div>

                <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
                    {testimonials.map((testimonial, index) => (
                        <Testimonial
                            key={index}
                            content={testimonial.content}
                            author={testimonial.author}
                            role={testimonial.role}
                            image={testimonial.image}
                        />
                    ))}
                </div>
            </div>
        </section>
    );
};

export default Testimonials;
