import Hero from './components/Hero';
import StatsSection from './components/StatsSection';
import ServicesSection from './components/ServicesSection';
import AboutSection from './components/AboutSection';
import BusinessSectorsSection from './components/BusinessSectorsSection';
import CustomerServiceSection from './components/CustomerServiceSection';
import LegalStatusSection from './components/LegalStatusSection';
import OnlineStoreSection from './components/ContactSection';
import TestimonialsSection from './components/TestimonialsSection';
import NewsSection from './components/NewsSection';


export default function HomePage() {
  return (
    <>
      <Hero />
       <AboutSection />
      <StatsSection />
      <ServicesSection />
     
      <BusinessSectorsSection />
      <CustomerServiceSection />
      <LegalStatusSection />
      <OnlineStoreSection />
      <TestimonialsSection />
      <NewsSection />
    </>
  );
}
