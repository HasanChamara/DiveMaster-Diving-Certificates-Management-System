import React from 'react';
import { Mail, MapPin, PhoneCall, Clock, Send } from 'lucide-react';
import Navbar from '@/components/home-components/Naabar';

const ContactCard: React.FC<{ icon: React.ReactNode; title: string; details: string; link?: string }> = ({ icon, title, details, link }) => {
    return (
        <div className="flex flex-col items-center rounded-lg border border-gray-100 bg-white p-6 text-center shadow-md transition-shadow duration-300 hover:shadow-lg">
            <div className="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-teal-100 text-teal-600">{icon}</div>
            <h3 className="mb-2 text-lg font-semibold text-slate-900">{title}</h3>
            {link ? (
                <a href={link} className="text-gray-600 transition-colors hover:text-teal-600">
                    {details}
                </a>
            ) : (
                <p className="text-gray-600">{details}</p>
            )}
        </div>
    );
};

const Contact: React.FC = () => {
    return (
        <div>
            {/* Hero Section */} <Navbar />
            <section className="bg-gradient-to-b from-slate-900 to-slate-800 py-20 text-white">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="mx-auto max-w-3xl text-center">
                        <h1 className="mb-6 text-4xl font-bold">Contact Us</h1>
                        <p className="text-xl leading-relaxed text-gray-300">
                            Have questions about DiveMaster? We're here to help. Reach out to our team and we'll get back to you as soon as possible.
                        </p>
                    </div>
                </div>
            </section>
            {/* Contact Info Cards */}
            <section className="bg-slate-50 py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        <ContactCard
                            icon={<Mail className="h-6 w-6" />}
                            title="Email"
                            details="support@divemaster.com"
                            link="mailto:support@divemaster.com"
                        />
                        <ContactCard icon={<PhoneCall className="h-6 w-6" />} title="Phone" details="+1 (555) 123-4567" link="tel:+15551234567" />
                        <ContactCard icon={<MapPin className="h-6 w-6" />} title="Office" details="123 Dive Lane, Miami, FL 33101" />
                        <ContactCard icon={<Clock className="h-6 w-6" />} title="Hours" details="Mon-Fri: 9am - 5pm EST" />
                    </div>
                </div>
            </section>
            {/* Contact Form & Map */}
            <section className="bg-white py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 gap-12 lg:grid-cols-2">
                        {/* Contact Form */}
                        <div>
                            <h2 className="mb-6 text-2xl font-bold text-slate-900">Send us a Message</h2>
                            <form className="space-y-6">
                                <div>
                                    <label htmlFor="name" className="mb-1 block text-sm font-medium text-gray-700">
                                        Full Name
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                        placeholder="John Smith"
                                    />
                                </div>
                                <div>
                                    <label htmlFor="email" className="mb-1 block text-sm font-medium text-gray-700">
                                        Email Address
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                        placeholder="john@example.com"
                                    />
                                </div>
                                <div>
                                    <label htmlFor="subject" className="mb-1 block text-sm font-medium text-gray-700">
                                        Subject
                                    </label>
                                    <input
                                        type="text"
                                        id="subject"
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                        placeholder="How can we help you?"
                                    />
                                </div>
                                <div>
                                    <label htmlFor="message" className="mb-1 block text-sm font-medium text-gray-700">
                                        Message
                                    </label>
                                    <textarea
                                        id="message"
                                        rows={5}
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                        placeholder="Your message here..."
                                    ></textarea>
                                </div>
                                <button
                                    type="submit"
                                    className="flex items-center justify-center rounded-lg bg-teal-600 px-6 py-3 font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700"
                                >
                                    <Send className="mr-2 h-4 w-4" />
                                    Send Message
                                </button>
                            </form>
                        </div>

                        {/* Map & Additional Info */}
                        <div>
                            <h2 className="mb-6 text-2xl font-bold text-slate-900">Visit our Office</h2>
                            <div className="mb-6 aspect-video overflow-hidden rounded-lg bg-slate-200">
                                {/* This is a placeholder for a map. In a real implementation, you'd integrate with Google Maps or another mapping service */}
                                <div className="flex h-full w-full items-center justify-center bg-slate-300 text-slate-600">
                                    <MapPin className="mr-2 h-8 w-8" />
                                    <span className="text-lg font-medium">Interactive Map</span>
                                </div>
                            </div>

                            <div className="rounded-lg border border-gray-200 bg-slate-50 p-6">
                                <h3 className="mb-4 text-lg font-semibold text-slate-900">Additional Contact Methods</h3>
                                <div className="space-y-4">
                                    <div>
                                        <h4 className="font-medium text-slate-900">Customer Support</h4>
                                        <p className="text-gray-600">For technical issues and general inquiries</p>
                                        <a href="mailto:support@divemaster.com" className="text-teal-600 hover:text-teal-800">
                                            support@divemaster.com
                                        </a>
                                    </div>
                                    <div>
                                        <h4 className="font-medium text-slate-900">Sales Team</h4>
                                        <p className="text-gray-600">For pricing and product information</p>
                                        <a href="mailto:sales@divemaster.com" className="text-teal-600 hover:text-teal-800">
                                            sales@divemaster.com
                                        </a>
                                    </div>
                                    <div>
                                        <h4 className="font-medium text-slate-900">Partnership Inquiries</h4>
                                        <p className="text-gray-600">For collaboration opportunities</p>
                                        <a href="mailto:partners@divemaster.com" className="text-teal-600 hover:text-teal-800">
                                            partners@divemaster.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* FAQ Section */}
            <section className="bg-slate-50 py-16">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="mb-12 text-center">
                        <h2 className="mb-4 text-3xl font-bold text-slate-900">Frequently Asked Questions</h2>
                        <p className="mx-auto max-w-3xl text-gray-600">Find quick answers to common questions about DiveMaster.</p>
                    </div>

                    <div className="mx-auto max-w-3xl">
                        <div className="space-y-6">
                            <div className="rounded-lg bg-white p-6 shadow-sm">
                                <h3 className="mb-2 text-lg font-semibold text-slate-900">What diving certification agencies are supported?</h3>
                                <p className="text-gray-600">
                                    DiveMaster supports all major diving certification agencies including PADI, SSI, NAUI, CMAS, and more. We're
                                    continuously adding support for additional agencies.
                                </p>
                            </div>
                            <div className="rounded-lg bg-white p-6 shadow-sm">
                                <h3 className="mb-2 text-lg font-semibold text-slate-900">How secure is my diver data?</h3>
                                <p className="text-gray-600">
                                    We employ bank-level encryption and follow GDPR compliance standards to ensure your data is always secure. All
                                    personal information is encrypted both in transit and at rest.
                                </p>
                            </div>
                            <div className="rounded-lg bg-white p-6 shadow-sm">
                                <h3 className="mb-2 text-lg font-semibold text-slate-900">Can I import existing certification records?</h3>
                                <p className="text-gray-600">
                                    Yes! We offer a simple import tool that allows you to upload existing certification records in various formats,
                                    including Excel, CSV, and direct imports from some agency databases.
                                </p>
                            </div>
                            <div className="rounded-lg bg-white p-6 shadow-sm">
                                <h3 className="mb-2 text-lg font-semibold text-slate-900">
                                    Is there a limit to how many certifications I can manage?
                                </h3>
                                <p className="text-gray-600">
                                    Our plans are based on the number of active divers you manage, not the number of certifications. Each diver can
                                    have unlimited certifications associated with their profile.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Contact;
