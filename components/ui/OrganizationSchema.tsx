import { company } from "@/data/company";

export default function OrganizationSchema() {
  const schema = {
    "@context": "https://schema.org",
    "@type": "Organization",
    name: company.name,
    email: company.email,
    telephone: company.phone.office,
    address: [
      {
        "@type": "PostalAddress",
        name: "دفتر مرکزی",
        streetAddress: company.address.headOffice,
        addressCountry: "IR",
      },
      {
        "@type": "PostalAddress",
        name: "کارخانه",
        streetAddress: company.address.factory,
        addressCountry: "IR",
      },
    ],
  };

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  );
}
