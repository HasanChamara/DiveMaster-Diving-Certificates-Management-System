import { CheckCircle } from 'lucide-react';
import React from 'react';

const CTA: React.FC = () => {
    return (
        <section className="bg-white py-16">
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div className="overflow-hidden rounded-2xl bg-gradient-to-r from-teal-600 to-teal-800 shadow-xl">
                    <div className="md:flex">
                        <div className="p-10 md:w-1/2 md:p-12">
                            <h2 className="mb-4 text-3xl font-bold text-white">Ready to Streamline Your Certification Process?</h2>
                            <p className="mb-8 text-lg text-teal-100">
                                Join thousands of diving professionals who trust DiveMaster for their certification management needs.
                            </p>

                            <div className="mb-8 space-y-4">
                                <div className="flex items-center">
                                    <CheckCircle className="mr-2 h-5 w-5 text-white" />
                                    <span className="text-white">No credit card required</span>
                                </div>
                                <div className="flex items-center">
                                    <CheckCircle className="mr-2 h-5 w-5 text-white" />
                                    <span className="text-white">Free 14-day trial</span>
                                </div>
                                <div className="flex items-center">
                                    <CheckCircle className="mr-2 h-5 w-5 text-white" />
                                    <span className="text-white">Cancel anytime</span>
                                </div>
                            </div>

                            <button className="rounded-lg bg-white px-6 py-3 font-medium text-teal-800 shadow-md transition duration-150 ease-in-out hover:bg-teal-50">
                                Start Your Free Trial
                            </button>
                        </div>

                        <div className="flex items-center justify-center bg-teal-700 p-10 md:w-1/2 md:p-12">
                            <div className="w-full max-w-md rounded-lg border border-white/20 bg-white/10 p-6 backdrop-blur-sm">
                                <h3 className="mb-4 text-xl font-medium text-white">Request a Demo</h3>
                                <form className="space-y-4">
                                    <div>
                                        <label htmlFor="name" className="mb-1 block text-sm font-medium text-white">
                                            Full Name
                                        </label>
                                        <input
                                            type="text"
                                            id="name"
                                            className="w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-white placeholder-teal-200 focus:ring-2 focus:ring-white focus:outline-none"
                                            placeholder="John Smith"
                                        />
                                    </div>
                                    <div>
                                        <label htmlFor="email" className="mb-1 block text-sm font-medium text-white">
                                            Email Address
                                        </label>
                                        <input
                                            type="email"
                                            id="email"
                                            className="w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-white placeholder-teal-200 focus:ring-2 focus:ring-white focus:outline-none"
                                            placeholder="john@example.com"
                                        />
                                    </div>
                                    <div>
                                        <label htmlFor="company" className="mb-1 block text-sm font-medium text-white">
                                            Dive Center/School
                                        </label>
                                        <input
                                            type="text"
                                            id="company"
                                            className="w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-white placeholder-teal-200 focus:ring-2 focus:ring-white focus:outline-none"
                                            placeholder="Ocean Adventures"
                                        />
                                    </div>
                                    <button
                                        type="submit"
                                        className="w-full rounded-lg bg-white px-4 py-2 font-medium text-teal-800 transition duration-150 ease-in-out hover:bg-teal-50"
                                    >
                                        Schedule Demo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default CTA;
