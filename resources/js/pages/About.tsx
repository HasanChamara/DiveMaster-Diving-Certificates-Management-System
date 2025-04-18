import Navbar from '@/components/home-components/Naabar';
import { Award, Briefcase, Globe, Users } from 'lucide-react';
import React from 'react';

interface TeamMemberProps {
    name: string;
    role: string;
    image: string;
    bio: string;
}

const TeamMember: React.FC<TeamMemberProps> = ({ name, role, image, bio }) => {
    return (
        <div className="overflow-hidden rounded-lg bg-white shadow-md">
            <img src={image} alt={name} className="h-64 w-full object-cover object-center" />
            <div className="p-6">
                <h3 className="text-xl font-semibold text-slate-900">{name}</h3>
                <p className="mb-4 text-teal-600">{role}</p>
                <p className="text-gray-600">{bio}</p>
            </div>
        </div>
    );
};

interface StatProps {
    icon: React.ReactNode;
    value: string;
    label: string;
}

const Stat: React.FC<StatProps> = ({ icon, value, label }) => {
    return (
        <div className="flex flex-col items-center p-6">
            <div className="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-teal-100 text-teal-600">{icon}</div>
            <p className="mb-1 text-3xl font-bold text-slate-900">{value}</p>
            <p className="text-center text-gray-500">{label}</p>
        </div>
    );
};

const About: React.FC = () => {
    const team = [
        {
            name: 'Alex Morgan',
            role: 'Founder & CEO',
            image: 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=600',
            bio: 'Former dive instructor with 15 years of experience. Created DiveMaster to solve the certification management challenges he experienced firsthand.',
        },
        {
            name: 'Sophia Chen',
            role: 'Head of Product',
            image: 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=600',
            bio: 'Passionate diver and tech enthusiast with a background in UX design. Leads our product development with a focus on user-centered solutions.',
        },
        {
            name: 'Marcus Johnson',
            role: 'Technical Director',
            image: 'https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&w=600',
            bio: 'Software engineer with expertise in secure data systems. Ensures DiveMaster meets the highest standards of security and reliability.',
        },
        {
            name: 'Elena Rodriguez',
            role: 'Customer Success',
            image: 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=600',
            bio: 'Dive instructor turned customer advocate. Helps diving businesses maximize their success with the DiveMaster platform.',
        },
    ];

    return (
        <div>
            {/* Hero Section */}
            <Navbar />
            <section className="bg-gradient-to-b from-slate-900 to-slate-800 py-20 text-white">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="mx-auto max-w-3xl text-center">
                        <h1 className="mb-6 text-4xl font-bold">About DiveMaster</h1>
                        <p className="mb-8 text-xl leading-relaxed text-gray-300">
                            We're revolutionizing how diving certifications are managed, issued, and verified worldwide.
                        </p>
                    </div>
                </div>
            </section>

            {/* Our Story */}
            <section className="bg-white py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="md:flex md:items-center md:space-x-12">
                        <div className="mb-10 md:mb-0 md:w-1/2">
                            <img
                                src="https://images.pexels.com/photos/1645028/pexels-photo-1645028.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750"
                                alt="Divers underwater"
                                className="h-auto w-full rounded-lg shadow-xl"
                            />
                        </div>
                        <div className="md:w-1/2">
                            <h2 className="mb-6 text-3xl font-bold text-slate-900">Our Story</h2>
                            <p className="mb-6 leading-relaxed text-gray-600">
                                DiveMaster was born out of necessity. As diving professionals, we experienced firsthand the challenges of managing
                                certifications, verifying credentials, and keeping track of student progress using outdated paper-based systems.
                            </p>
                            <p className="mb-6 leading-relaxed text-gray-600">
                                In 2022, we set out to create a solution that would not only make certification management easier for dive
                                professionals but also enhance credibility and security in the diving industry. Our platform combines cutting-edge
                                technology with deep diving industry expertise.
                            </p>
                            <p className="leading-relaxed text-gray-600">
                                Today, DiveMaster is trusted by diving schools and professionals in over 30 countries, helping them issue, verify, and
                                manage certifications with confidence and ease.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Stats */}
            <section className="bg-slate-50 py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
                        <Stat icon={<Award className="h-6 w-6" />} value="50,000+" label="Certifications Managed" />
                        <Stat icon={<Briefcase className="h-6 w-6" />} value="500+" label="Dive Schools" />
                        <Stat icon={<Users className="h-6 w-6" />} value="2,000+" label="Instructors" />
                        <Stat icon={<Globe className="h-6 w-6" />} value="30+" label="Countries" />
                    </div>
                </div>
            </section>

            {/* Mission & Values */}
            <section className="bg-white py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="mb-16 text-center">
                        <h2 className="mb-4 text-3xl font-bold text-slate-900">Our Mission & Values</h2>
                        <p className="mx-auto max-w-3xl text-xl text-gray-600">
                            We're driven by a passion for diving and a commitment to enhancing safety and credibility in the diving industry.
                        </p>
                    </div>

                    <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div className="rounded-lg border border-teal-100 bg-teal-50 p-8">
                            <h3 className="mb-4 text-xl font-semibold text-slate-900">Innovation</h3>
                            <p className="text-gray-600">
                                We continuously improve our platform to meet the evolving needs of diving professionals and enhance the certification
                                experience.
                            </p>
                        </div>
                        <div className="rounded-lg border border-teal-100 bg-teal-50 p-8">
                            <h3 className="mb-4 text-xl font-semibold text-slate-900">Integrity</h3>
                            <p className="text-gray-600">
                                We uphold the highest standards of trust and transparency in all our operations and partnerships.
                            </p>
                        </div>
                        <div className="rounded-lg border border-teal-100 bg-teal-50 p-8">
                            <h3 className="mb-4 text-xl font-semibold text-slate-900">Safety</h3>
                            <p className="text-gray-600">
                                We believe secure, verifiable certifications contribute to safer diving practices worldwide.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Team */}
            <section className="bg-slate-50 py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="mb-16 text-center">
                        <h2 className="mb-4 text-3xl font-bold text-slate-900">Meet Our Team</h2>
                        <p className="mx-auto max-w-3xl text-xl text-gray-600">
                            A passionate group of divers and technologists committed to transforming certification management.
                        </p>
                    </div>

                    <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        {team.map((member, index) => (
                            <TeamMember key={index} name={member.name} role={member.role} image={member.image} bio={member.bio} />
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
};

export default About;
