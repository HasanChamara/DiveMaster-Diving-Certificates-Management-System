import { Award, BarChart, Calendar, Cloud, Printer, Search, Shield, User } from 'lucide-react';
import React from 'react';

interface FeatureProps {
    icon: React.ReactNode;
    title: string;
    description: string;
}

const Feature: React.FC<FeatureProps> = ({ icon, title, description }) => {
    return (
        <div className="rounded-lg border border-gray-100 bg-white p-6 shadow-lg transition-shadow duration-300 hover:shadow-xl">
            <div className="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-teal-100 text-teal-600">{icon}</div>
            <h3 className="mb-2 text-lg font-semibold text-slate-800">{title}</h3>
            <p className="text-gray-600">{description}</p>
        </div>
    );
};

const Features: React.FC = () => {
    const features = [
        {
            icon: <Award className="h-6 w-6" />,
            title: 'Certificate Management',
            description: 'Create, issue, and manage diving certifications with customizable templates and automated workflows.',
        },
        {
            icon: <User className="h-6 w-6" />,
            title: 'Diver Profiles',
            description: 'Maintain comprehensive diver records including certifications, medical information, and training history.',
        },
        {
            icon: <Search className="h-6 w-6" />,
            title: 'Verification System',
            description: 'Allow instant verification of certification status through a secure online portal or QR codes.',
        },
        {
            icon: <Calendar className="h-6 w-6" />,
            title: 'Expiration Tracking',
            description: 'Automated alerts for expiring certifications and required renewal courses for both divers and instructors.',
        },
        {
            icon: <Printer className="h-6 w-6" />,
            title: 'Export & Print',
            description: 'Generate professional PDF certificates and cards that can be printed or shared digitally.',
        },
        {
            icon: <Shield className="h-6 w-6" />,
            title: 'Secure Storage',
            description: 'Bank-level encryption to protect sensitive diver information and certification data.',
        },
        {
            icon: <BarChart className="h-6 w-6" />,
            title: 'Analytics Dashboard',
            description: 'Track certification metrics, instructor performance, and business growth with visual reports.',
        },
        {
            icon: <Cloud className="h-6 w-6" />,
            title: 'Cloud Access',
            description: 'Access your certification data from anywhere, anytime, with cloud-based storage and synchronization.',
        },
    ];

    return (
        <section className="bg-slate-50 py-16">
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div className="mb-16 text-center">
                    <h2 className="mb-4 text-3xl font-bold text-slate-900 md:text-4xl">Powerful Features for Dive Professionals</h2>
                    <p className="mx-auto max-w-3xl text-xl text-gray-600">
                        Everything you need to manage diving certifications efficiently in one comprehensive platform.
                    </p>
                </div>

                <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    {features.map((feature, index) => (
                        <Feature key={index} icon={feature.icon} title={feature.title} description={feature.description} />
                    ))}
                </div>
            </div>
        </section>
    );
};

export default Features;
